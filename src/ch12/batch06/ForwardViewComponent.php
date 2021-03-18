<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

/* listing 12.28 */
class ForwardViewComponent implements ViewComponent
{
    public function __construct(private ?string $path)
    {
    }

    public function render(Request $request): void
    {
        $request->forward($this->path);
    }
}
/* /listing 12.28 */
