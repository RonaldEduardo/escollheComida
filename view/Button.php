<?php
namespace View;

class Button
{
  public function __construct()
  {
    echo '<Button ' . $this->onClick() . '>Click me</Button>';
  }

  public function onClick()
  {
    return 'onClick="alert(\'Hello, World!\')"';
  }
}
