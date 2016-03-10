<?php
/**
*�����������������
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
$stack = array();  //����һ����ջ
$html = array();   //�������������Ŀ֮��Ĺ�ϵ�Լ�����Ŀ�����
/*
 * �Զ�����ջ����
 */
function pushStack(&$stack,$channel,$dep){
    array_push($stack, array('channel'=>$channel,'dep'=>$dep));
}
/*
 * �Զ����ջ����
 */
function popStack(&$stack){
    return array_pop($stack);
}
/*
 * ���Ƚ�������Ŀѹ��ջ��
 */
foreach($channels as $key=>$val){
    if($val['parId'] == 0)
        pushStack($stack,$val,0);
}
/*
 * ��ջ�е�Ԫ�س�ջ������������Ŀ
 */
do{
    $par = popStack($stack); //��ջ��Ԫ�س�ջ
    /*
     * �����Դ���ĿΪ������Ŀ��id������Щ��Ŀ��ջ
     */
    for($i=0;$i<count($channels);$i++){
        if($channels[$i]['parId'] == $par['channel']['id']){
            pushStack($stack,$channels[$i],$par['dep']+1);
        }
    }
    /*
     * ����ջ����Ŀ�Լ�����Ŀ����ȱ��浽������
     */
    $html[] = array('id'=>$par['channel']['id'],'name'=>$par['channel']['name'],'dep'=>$par['dep']);
}while(count($stack)>0);
