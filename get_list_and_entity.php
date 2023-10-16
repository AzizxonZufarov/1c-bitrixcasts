<?php require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/header.php');
use \Bitrix\Main\ORM;
//\Bitrix\Main\Loader::includeModule('iblock');
//\Bitrix\Iblock\IblockTable::getTableName();
//\Bitrix\Iblock\IblockTable::getMap();

//class AzizIblockTable extends \Bitrix\Main\ORM\Data\DataManager {
//    public static function getTableName()
//    {
//        return 'b_iblock';
//    }
//
//    public static function getMap()
//    {
//        return [
//            'ID' => [
//                'data_type' => 'integer',
//                'primary' => true,
//            ],
//            'NAME' => [
//                'data_type' => 'string',
//            ]
//        ];
//    }
//}
//$result = AzizIblockTable::update(1, [
//    'NAME' => 'Блоги'
//    //'NAME' => date('H:i:s')
//]);
//$res = \Bitrix\Iblock\IblockTable::getList([
//$res = \AzizIblockTable::getList([
//    'filter' => [
//        '>=ZZZ' => 1
//    ],
//    'select' => [
//        'ZZZ' =>'ID',
//        'TITLE' =>'NAME'
//    ]
//]);

//$query = new ORM\Query\Query('AzizIblockTable');
//$res = $query
//    ->setFilter([
//        '>=ZZZ' => 1
//    ])
//    ->setSelect([
//        'ZZZ' => 'ID',
//        'TITLE' => 'NAME'
//    ])
//    ->exec();
//while ($arr = $res->fetch()) {
//    echo '<pre>', print_r($arr), '</pre>';
//}
use Bitrix\Main\Entity;
class BookTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'my_book';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true
            )),
            new Entity\StringField('ISBN', array(
                'required' => true,
            )),
            new Entity\StringField('TITLE', array(
                'validation' => function() {
                    return array(
                        new Entity\Validator\RegExp('/[\w-]{10,}/')
                    );
            })),
            new Entity\DateField('PUBLISH_DATE')
        );
    }
}
use Bitrix\Main\Type;
$result = BookTable::add(array(
    'ISBN' => '978-0321127426',
    'TITLE' => 'Patterns of Enterprise Application Architecture',
    'PUBLISH_DATE' => new Type\Date('2002-11-16', 'Y-m-d')
));
//$result = BookTable::update(1, array(
//    'PUBLISH_DATE' => new Type\Date('2222-11-15', 'Y-m-d')
//));
//$result = BookTable::delete(2);
if (!$result->isSuccess())
{
    $errors = $result->getErrorMessages();
}
print_r($result->getErrorMessages());
require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/footer.php');