<?php
/**
 * �ݹ�ʵ�����޼�����
 */
$channels = array(
    array('id'=>1,'name'=>"�·�",'parId'=>0),
    array('id'=>2,'name'=>"�鼮",'parId'=>0),
    array('id'=>3,'name'=>"T��",'parId'=>1),
    array('id'=>4,'name'=>"����",'parId'=>1),
    array('id'=>5,'name'=>"Ь��",'parId'=>1),
    array('id'=>6,'name'=>"ƤЬ",'parId'=>5),
    array('id'=>7,'name'=>"�˶�Ь",'parId'=>5),
    array('id'=>8,'name'=>"�Ϳ�",'parId'=>7),
    array('id'=>9,'name'=>"�Ϳ�",'parId'=>3),
    array('id'=>10,'name'=>"���Ƕ���",'parId'=>7),
    array('id'=>11,'name'=>"С˵",'parId'=>2),
    array('id'=>12,'name'=>"�ƻ�С˵",'parId'=>11),
    array('id'=>13,'name'=>"�ŵ�����",'parId'=>11),
    array('id'=>14,'name'=>"��ѧ",'parId'=>2),
    array('id'=>15,'name'=>"�����徭",'parId'=>14)
);
$html = array();

/**
 * �ݹ���Ҹ�idΪ$parid�Ľ��
 * @param array $html   ���ո�-���ӵĽṹ��Ų��ҳ����Ľ��
 * @param int $parid    ָ���ĸ�id
 * @param array $channels   ��������
 * @param int $dep   ��������ȣ���ʼ��Ϊ1
 */
function getChild(&$html,$parid,$channels,$dep){
    /*
     * �������ݣ�����parIdΪ����$paridָ����id
     */
    for($i = 0;$i<count($channels);$i++){
        if($channels[$i]['parId'] == $parid){
            $html[] = array('id'=>$channels[$i]['id'],'name'=>$channels[$i]['name'],'dep'=>$dep);
            getChild($html,$channels[$i]['id'],$channels,$dep+1);
        }
    }
}
getChild($html,0,$channels,1);
echo "<pre>";
print_r($html);

?>