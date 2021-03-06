<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加文章</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:add}" method="post" onsubmit="return false;">
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <tr>
                    <th>缩略图</th>
                </tr>
                <tr>
                    <td>
                        <img id="thumb" src="__ROOT__/hdcms/static/img/upload-pic.png"
                             style="cursor: pointer;width:135px;height:113px;"
                             onclick="file_upload('thumb','thumb',1,'thumb')"/>
                        <input type="hidden" name="thumb"/>
                        <button type="button" class="btn3" onclick="crop_image('thumb')">裁切图片</button>
                        <button type="button" class="btn3" onclick="remove_thumb(this)">取消上传</button>
                    </td>
                </tr>
                <tr>
                    <th>发布时间</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="updatetime" name="updatetime" value="{|date:'Y/m/d h:i:s'}"
                               class="w150"/>
                        <script>
                            $('#updatetime').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
                        </script>
                    </td>
                </tr>
                <tr>
                    <th>跳转地址</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="redirecturl" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>生成静态</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="ishtml" value="1" checked="checked"/> 是</label>
                        <label><input type="radio" name="ishtml" value="0"/> 否</label>
                    </td>
                </tr>
                <tr>
                    <th>允许回复</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="allowreply" value="1" checked="checked"/>
                            允许</label>
                        <label><input type="radio" name="allowreply" value="0"/> 不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>点击</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="click" class="w150" value="100"/>
                    </td>
                </tr>
                <tr>
                    <th>来源</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="source" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>作者</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="username" class="w150" value="{$hd.session.username}"/>
                    </td>
                </tr>
            </table>

        </div>
        <div class="content_left">
            <div class="table_title">添加文章</div>
            <table class="table1">
                <tr>
                    <th class="w80">标题</th>
                    <td>
                        <span class="star">*</span><input id="title" type="text" name="title" class="title w400"/>
                        <label>
                            标题颜色 <input type="text" name="color" class="w60"/>
                        </label>
                        <button type="button" onclick="selectColor(this,'color')">选取颜色</button>
                        <label><input type="checkbox" name="new_window" value="1"/> 新窗口打开</label>
                    </td>
                </tr>
                <tr>
                    <th class="w80">SEO标题</th>
                    <td>
                      <input type="text" name="seo_title" class="w500"/>
                    </td>
                </tr>
                <tr>
                    <th>属性</th>
                    <td>
                        <list from="$flag" name="f">
                            <label>
                                <input type="hidden" name="content_flag[{$f.fid}][cid]" value="{$category.cid}"/>
                              <label><input type="checkbox" name="content_flag[{$f.fid}][fid]" value="{$f.fid}"/> {$f.flagname}</label>
                            </label>
                        </list>
                    </td>
                </tr>
                <tr>
                    <th>栏目</th>
                    <td>
                        <input type="hidden" name="cid" value="{$category.cid}"/>
                        {$category.catname}
                    </td>
                </tr>
                <!--标准模型显示正文字段-->
                <if value="$model.type==1">
                    <tr>
                        <th>关键字</th>
                        <td>
                            <input type="text" name="{$model.tablename}_data[keywords]" class="w400"/>
                        </td>
                    </tr>
                    <tr>
                        <th>摘要</th>
                        <td>
                            <textarea name="{$model.tablename}_data[description]" class="w450 h80"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>内容</th>
                        <td>
                            <span class="star">*</span>
                            {|tag:"ueditor",array("name"=>$model['tablename']."_data[content]")}
                            <div class="editor_set">
                                <label><input type="checkbox" name="down_remote_pic" value="1" <if value="$hd.config.down_remote_pic==1">checked="checked"</if>/>下载远程图片</label>
                                <label><input type="checkbox" name="auto_desc" value="1" <if value="$hd.config.auto_desc==1">checked="checked"</if>/>是否截取内容</label>
                                <input type="text" size="3" value="200" name="auto_desc_length">
                                字符至内容摘要
                                <label><input type="checkbox" name="auto_thumb" value="1" <if value="$hd.config.auto_thumb==1">checked="checked"</if>/>否获取内容第</label>
                                <input type="text" size="2" value="1" name="auto_thumb_num">
                                张图片作为缩略图
                            </div>
                        </td>
                    </tr>
                </if>
                <!--自定义字段-->
                {$custom_field}
                <!--自定义字段-->
                <tr>
                    <th>模板</th>
                    <td>
                        <input class="w250" type="text" name="template" id="template">
                        <button class="select_tpl" type="button" onclick="select_tpl('template')">选择模板</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
        <input type="button" class="btn2 close_window" value="关闭"/>
    </div>
</form>
</body>
</html>