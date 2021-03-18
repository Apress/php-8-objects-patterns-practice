<?php

declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.80 */
class ModuleRunner
{
    private array $configData = [
        PersonModule::class => ['person' => 'bob'],
        FtpModule::class    => [
            'host' => 'example.com',
            'user' => 'anon'
        ]
    ];

    private array $modules = [];

    // ...
/* /listing 05.80 */
/* listing 05.81 */

    // class ModuleRunner
    public function init(): void
    {
        $interface = new \ReflectionClass(Module::class);
        foreach ($this->configData as $modulename => $params) {
            $module_class = new \ReflectionClass($modulename);
            if (! $module_class->isSubclassOf($interface)) {
                throw new Exception("unknown module type: $modulename");
            }
            $module = $module_class->newInstance();
            foreach ($module_class->getMethods() as $method) {
                $this->handleMethod($module, $method, $params);
                // we cover handleMethod() in a future listing!
            }
            array_push($this->modules, $module);
        }
    }
/* /listing 05.81 */

/* listing 05.83 */

    // class ModuleRunner
    public function handleMethod(Module $module, \ReflectionMethod $method, array $params): bool
    {
        $name = $method->getName();
        $args = $method->getParameters();

        if (count($args) != 1 || substr($name, 0, 3) != "set") {
            return false;
        }

        $property = strtolower(substr($name, 3));

        if (! isset($params[$property])) {
            return false;
        }

      
        if (! $args[0]->hasType()) {
            $method->invoke($module, $params[$property]);
            return true;
        }

        $arg_type = $args[0]->getType();

        if (! ($arg_type instanceof \ReflectionUnionType) && class_exists($arg_type->getName())) {
            $method->invoke(
                $module,
                (new \ReflectionClass($arg_type->getName()))->newInstance($params[$property])
            );
        } else {
            $method->invoke($module, $params[$property]);
        }
        return true;
    }
/* /listing 05.83 */

/* listing 05.80 */
}
/* /listing 05.80 */
