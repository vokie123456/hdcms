<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">温馨提示</div>
    <div class="help">
        修改模板文件前，请做好备份操作！
    </div>
    <if value="$hd.get.dir_name">
        <a href="javascript:window.back();" class="btn1" style="display: inline-block;margin-bottom: 15px;">返回</a>
    </if>
    <table class="table2">
        <thead>
        <tr>
            <td>文件名</td>
            <td>修改时间</td>
            <td>大小</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <list from="$dirs" name="d">
            <tr>
                <td>{$d.name}</td>
                <td>{$d.filemtime|date:"Y-m-d H:i",@@}</td>
                <td>{$d.size|get_size}</td>
                <td>
                    <if value="$d.type=='dir'">
                        <a href="__METH__&dir_name={$d.path|urlencode}">进入</a>
                        <else>
                            <a href="__CONTROL__&m=edit_tpl&tpl_name={$d.path|urlencode}"  target="_blank" >修改</a>
                    </if>
                </td>
            </tr>
        </list>
    </table>
</div>
</body>
</html>