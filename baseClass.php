<?php
/**
 * Description of BaseClass
 * 
 * @author igor
 */
class BaseClass {
    
    /**
     *
     * @var type array хранилище
     * здесь будут храниться динамически присваиваемые св-ва
     */
    private $arrData = array();

    private $propertyReadOnlyA = 'a';
    private $propertyReadOnlyB = 'b';
    private $propertyReadWrite = "read write";
    /**
     * 
     * @param type $propName имя устанавливаемого св-ва
     * @param type $value значение устанавливаемого св-ва
     * @throws Exception
     */
    public function __set($propName , $value)
    {
        try {
            switch ($propName) {
                case "propertyReadOnlyA":
                    throw new Exception("Exception: readOnly property!!!");
                    
                case "propertyReadOnlyB":
                    throw new Exception("Exception: readOnly property!!!");
                    
                case "propertyReadWrite":
                    $this->$propName = $value;
                    break;
                default:
                    $this->arrData[$propName] = $value;
                    break;
            }              
        }catch (Exception $e) {
                echo $e->getMessage();
        }
    }
    /**
     * 
     * @param type string $propName
     * @return значение св-ва или Exception
     * @throws Exception
     */
    public function __get($propName)
    {  
        try{    
            //проверяем налчие св-ва
            if (array_key_exists($propName, $this->arrData)) {
                return $this->arrData[$propName];
            }elseif(array_key_exists($propName ,get_class_vars(__CLASS__))){
                return $this->$propName;
            }else{ 
                throw new Exception("Exception: св-во не установлено");
            }
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /**
     * проверяет установлено ли св-во
     * возможно тут нагромаждение, но это корректно работает
     * @param type $propName
     * @return boolean
     */
    public function __isset($propName) 
    {
        if (array_key_exists($propName, $this->arrData)){
            return isset($this->arrData[$propName]);
        }elseif(array_key_exists($propName ,get_class_vars(__CLASS__))){
            return isset($this->$propName);
        }else{
            return false;
        }
    }
    
}