<?php
/**
 * PhpBURN Model
 * Description of Avelino
 *
 * @author klederson
 */
/**
 * iGrape Framework
 *
 * @category	iGrape
 * @author		iGrape Dev Team
 * @copyright	Copyright (c) 2007-2010 iGrape Framework. (http://www.igrape.org)
 * @license		LICENSE New BSD License
 * @version		0.2.2
 *
 */
class Test extends PhpBURN_Core {
    //Configuration
    public $_tablename = 'avelino2';
    public $_package = 'igrape';

    //Fields
    public function _mapping() {
        $this->getMap()->addField('id_pessoa', 'id_pessoa', 'int', 10, array('auto_increment' => true, 'not_null' => true, 'primary' => true));
        $this->getMap()->addField('nome2', 'nome2', 'varchar', 255, array('not_null' => true));
        
    }

    //put your code here
}
?>
