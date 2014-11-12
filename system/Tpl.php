<?php

Class Tpl
{
    private $data;
    private $path; 
    private $tpl;
    
    public function __construct()
    {
        $this->path = APPPATH. 'view';        
    }
    
    /* Метод для добавления новых значений в данные для вывода */ 
  public function set($name, $value) {
    $this->data[$name] = $value;
  }

  /* Метод для удаления значений из данных для вывода */ 
  public function delete($name) {
    unset($this->data[$name]);
  }

  /* При обращении, например, к $this->title будет выводиться $this->data["title"] */ 
  public function __get($name)
  {
    if (isset($this->data[$name]))
    {
        return $this->data[$name];
    }
    else
    {
        return ;
    }
  }

  /* Вывод tpl-файла, в который подставляются все данные для вывода */ 
  public function generate($tmpname) 
  {
        $file = $this->path."/".$tmpname.".tpl";
        if( file_exists($file) )
        {
            ob_start(); 
            include ($file);
            $this->tpl = ob_get_clean(); 
        }
        else
        {
            $this->tpl = $tmpname;
        }
        
        return $this->tpl;
  }
    
}