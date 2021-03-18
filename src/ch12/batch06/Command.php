<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

/* listing 12.32 */
abstract class Command
{
/* listing 12.20 */
    public const CMD_DEFAULT = 0;
    public const CMD_OK = 1;
    public const CMD_ERROR = 2;
    public const CMD_INSUFFICIENT_DATA = 3;
/* /listing 12.20 */

    final public function __construct()
    {
    }

    public function execute(Request $request): void
    {
        $status = $this->doExecute($request);
        $request->setCmdStatus($status);
    }

    abstract protected function doExecute(Request $request): int;
}
/* /listing 12.32 */
