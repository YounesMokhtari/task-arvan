<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ImageResize;

class ImageResizeCommand extends Command
{
  use ImageResize;
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'image:resize';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Image Resize';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $this->prepareQueue();
  }
}
