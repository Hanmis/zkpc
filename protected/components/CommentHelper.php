<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-4-4
 * Time: 下午9:15
 * To change this template use File | Settings | File Templates.
 */
class CommentHelper
{
    public static function generateLvCss($newData) {
        //生成级别样式
        $lvStr='.lv_';
        $lvCss='';

        for ($i=2; $i<=getMaxLevel($newData); $i++) {
            $mlNum =30*($i-1);
            $ml ="margin-left:" . $mlNum ."px;";

            $bg = ($i%2==0)?"background-color:#fee;" : "background-color:#fff;";
            $lvCss .= $lvStr.$i . "{" . $ml .$bg. "}\n";
        }
        return $lvCss;
    }

    //生成newData数组
    public static function genNewData($data) {
        $volume = array();
        foreach ($data as $row) {
            $volume[] = $row['path'];
        }
        //按照path字段排序
        array_multisort($volume, SORT_ASC, $data);

        $newData = array();

        //按照path头个字段生成新的数组
        foreach ($data as $v) {
            $split = explode(',', $v['path']);
            $i = $split[0];
            $level = count($split) - 1;
            $v['lv'] = $level;
            $newData[$i][] = $v;
        }
        //把数组的key变成数字
        $newData = array_values($newData);
        return $newData;
    }
    //找出父评论的作者（code）
    public static function getAuthor($pid, $arr) {
        foreach ($arr as $k=>$v) {
            if ($pid == (int)$v['ccid'])
                return $arr[$k]['user'];
        }
    }
    //找出父评论的作者（topic）
    public static function getAuthor2($pid, $arr) {
        foreach ($arr as $k=>$v) {
            if ($pid == (int)$v['rid'])
                return $arr[$k]['user'];
        }
    }
    //取得最大级数
    private function getMaxLevel($data) {
        $max = 0;
        foreach ($data as $k=>$v) {
            foreach ($v as $k1=>$v1)
                $max = $max > $v1['lv'] ? $max : $v1['lv'];
        }
        return (int)$max;
    }
}
