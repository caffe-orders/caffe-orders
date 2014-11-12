<?php
// мы будем делать нашу собственную обработку ошибок
error_reporting(0);

// пользовательская функция для обработки ошибок
function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars) 
{
    // временная метка возникновения ошибки
    $dt = date("Y-m-d H:i:s (T)");

    // определим ассоциативный массив соответствия всех
    // констант уровней ошибок с их названиями, хотя
    // в действительности мы будем рассматривать только
    // следующие типы: E_WARNING, E_NOTICE, E_USER_ERROR,
    // E_USER_WARNING и E_USER_NOTICE
    $errortype = array (
                E_ERROR              => 'Ошибка',
                E_WARNING            => 'Предупреждение',
                E_PARSE              => 'Ошибка разбора исходного кода',
                E_NOTICE             => 'Уведомление',
                E_CORE_ERROR         => 'Ошибка ядра',
                E_CORE_WARNING       => 'Предупреждение ядра',
                E_COMPILE_ERROR      => 'Ошибка на этапе компиляции',
                E_COMPILE_WARNING    => 'Предупреждение на этапе компиляции',
                E_USER_ERROR         => 'Пользовательская ошибка',
                E_USER_WARNING       => 'Пользовательское предупреждение',
                E_USER_NOTICE        => 'Пользовательское уведомление',
                E_STRICT             => 'Уведомление времени выполнения',
                E_RECOVERABLE_ERROR  => 'Отлавливаемая фатальная ошибка'
                );
    // определим набор типов ошибок, для которых будет сохранен стек переменных
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
    
    $err = "<errorentry>\n";
    $err .= "\t<datetime>" . $dt . "</datetime>\n</br>";
    $err .= "\t<errornum>Номер ошибки " . $errno . "</errornum>\n</br>";
    $err .= "\t<errortype>Тип ошибки " . $errortype[$errno] . "</errortype>\n</br>";
    $err .= "\t<errormsg>Сообщение " . $errmsg . "</errormsg>\n</br>";
    $err .= "\t<scriptname>Имя файла " . $filename . "</scriptname>\n</br>";
    $err .= "\t<scriptlinenum>Строка с ошибкой " . $linenum . "</scriptlinenum>\n</br>";

    if (in_array($errno, $user_errors)) {
        $err .= "\t<vartrace>" . wddx_serialize_value($vars, "Переменные") . "</vartrace>\n";
    }
    $err .= "</errorentry>\n\n";
    
    // для тестирования
    // echo $err;

    // сохраняем в протокол ошибок, а если произошла пользовательская критическая ошибка, то отправляем письмо
    $fileName = APPATH.'error_logs/err_'. gmstrftime('%Y_%m_%d.log');
    file_put_contents($fileName, $err . "\n", FILE_APPEND);
       
    
    if($errno!=E_USER_ERROR and $errno!=E_USER_WARNING And $errno!=E_USER_NOTICE and $errno!=E_NOTICE)
    {
        exit($err);
    }
}


$old_error_handler = set_error_handler("userErrorHandler");

//trigger_error("Координата $i в ", E_USER_WARNING);
/*
class UserErrors
{
    public $errStr="";
    function __construct($errno,$errMsg)
    {
        if($errno==E_USER_ERROR or $errno==E_USER_WARNING or $errno==E_USER_NOTICE)
        {
            $this->errmsg.=$errMsg."<br />";
        }
    }
    function GetError()
    {
        return $this->errStr;
    }
    
}
*/
?>