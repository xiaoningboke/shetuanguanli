<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/shetuanguanli/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/shetuanguanli/Public/css/style.css"/>       
        <link href="/shetuanguanli/Public/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
			<script src="/shetuanguanli/Public/assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/shetuanguanli/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/shetuanguanli/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/shetuanguanli/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/shetuanguanli/Public/assets/js/bootstrap.min.js"></script>
		<script src="/shetuanguanli/Public/assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="/shetuanguanli/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/shetuanguanli/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="/shetuanguanli/Public/js/H-ui.js"></script> 
        <script type="text/javascript" src="/shetuanguanli/Public/js/H-ui.admin.js"></script> 
        <script src="/shetuanguanli/Public/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/shetuanguanli/Public/assets/laydate/laydate.js" type="text/javascript"></script>

<title>个人信息管理</title>
</head>

<body>
<div class="clearfix">
    <div class="admin_info_style">
        <div class="admin_modify_style" id="Personal">
            <div class="type_title">个人信息</div>
            <input type="hidden" name="id" id = "exitid" value="<?php echo ($data["id"]); ?>">
            <div class="xinxi">
                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">用户名： </label>
                    <div class="col-sm-9"><span><?php echo ($data["username"]); ?></span>
                        &nbsp;&nbsp;&nbsp;<a href="javascript:ovid()" onclick="change_Password()"
                                             class="btn btn-warning btn-xs">修改密码</a></div>

                </div>

                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">手机号： </label>
                    <div class="col-sm-9"><input type="text" name="phone" id="website-title" value="<?php echo ($data["phone"]); ?>"
                                                 class="col-xs-7 text_info" disabled="disabled"></div>
                </div>
                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">邮箱： </label>
                    <div class="col-sm-9"><input type="text" name="email" id="website-title" value="<?php echo ($data["email"]); ?>"
                                                 class="col-xs-7 text_info" disabled="disabled"></div>
                </div>
                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">真实姓名： </label>
                    <div class="col-sm-9"><input type="text" name="name" id="website-title" value="<?php echo ($data["name"]); ?>"
                                                 class="col-xs-7 text_info" disabled="disabled"></div>
                </div>

                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">身份： </label>
                    <div class="col-sm-9">
                        <?php if(($data["identity"] == 0)): ?><span>社团成员</span>
                            <?php elseif($data["identity"] == 1): ?>
                            <span>理事长</span>
                            <?php elseif($data["identity"] == 2): ?>
                            <span>秘书长</span>
                            <?php elseif($data["identity"] == 3): ?>
                            <span>系统管理员</span>
                            <?php else: endif; ?>

                    </div>
                </div>
                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">年级： </label>
                    <div class="col-sm-9"><input type="text" name="grade" id="website-title" value="<?php echo ($data["grade"]); ?>"
                                                 class="col-xs-7 text_info" disabled="disabled"></div>
                </div>

                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">系部： </label>
                    <div class="col-sm-9">
                        <span class="sex"><?php echo ($data["department"]); ?></span>
                        <div class="add_sex">
                            <div class="formControls "> <span class="select-box" style="width:150px;">
				<select class="select" name="department" size="1">
					<?php if(is_array($departmentData)): foreach($departmentData as $key=>$vo): ?><option value="<?php echo ($vo["department_name"]); ?>"><?php echo ($vo["department_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">专业： </label>
                    <div class="col-sm-9">
                        <span class="sex"><?php echo ($data["major"]); ?></span>
                        <div class="add_sex">
                            <div class="formControls "> <span class="select-box" style="width:150px;">
				<select class="select" name="major" size="1">
					<?php if(is_array($majorData)): foreach($majorData as $key=>$vo): ?><option value="<?php echo ($vo["major_name"]); ?>"><?php echo ($vo["major_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-1">班级： </label>
                    <div class="col-sm-9"><input type="text" name="userclass" id="website-title"
                                                 value="<?php echo ($data["userclass"]); ?>" class="col-xs-7 text_info"
                                                 disabled="disabled"></div>
                </div>
                <div class="Button_operation clearfix">
                    <button onclick="modify();" class="btn btn-danger radius" type="submit">修改信息</button>
                    <button onclick="save_info();" class="btn btn-success radius" type="button">保存修改</button>
                </div>
            </div>
        </div>

    </div>
</div>
<!--修改密码样式-->
<div class="change_Pass_style" id="change_Pass">
    <ul class="xg_style">
        <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class=""
                                                                          id="password"></li>
        <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class=""
                                                                          id="Nes_pas"></li>
        <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas"></li>

    </ul>
    <!--       <div class="center"> <button class="btn btn-primary" type="button" id="submit">确认修改</button></div>-->
</div>
</body>
</html>
<script>

    //按钮点击事件
    function modify() {
        $('.text_info').attr("disabled", false);
        $('.text_info').addClass("add");
        $('#Personal').find('.xinxi').addClass("hover");
        $('#Personal').find('.btn-success').css({'display': 'block'});
    };

    function save_info() {
    			var id = $("#exitid").val();
                var phone = $('input[name="phone"]').val();
                var email = $('input[name="email"]').val();
                var name = $('input[name="name"]').val();
                var department = $("select[name='department']").find('option:selected').text();
                var major = $("select[name='major']").find('option:selected').text();
                var grade = $('input[name="grade"]').val();
                var userclass = $('input[name="userclass"]').val();
                var data = {"id": id, "phone":phone,"email":email,"name":name,"department":department,"major":major,"grade":grade,"userclass":userclass};
                console.log(data);
        var num = 0;
        var str = "";
        $(".xinxi input[type$='text']").each(function (n) {
            if ($(this).val() == "") {

                layer.alert(str += "" + $(this).attr("name") + "不能为空！\r\n", {
                    title: '提示框',
                    icon: 0,
                });
                num++;
                return false;
            }
        });
        if (num > 0) {
            return false;
        } else {
        	 $.ajax({
            url: "<?php echo U('Admin/Index/exitUser');?>",//请求地址
            data: data,//发送的数据
            type: 'POST',//请求的方式
            success: function (argument) {
               layer.alert('修改成功！', {
                title: '提示框',
                icon: 1,
                end: function () {
                    window.location.reload();
                }
            });
            },// 请求成功执行的方法
            beforeSend: function (argument) {
                //console.log(argument);
            },// 在发送请求之前调用,可以做一些验证之类的处理
            error: function (argument) {
            },//请求失败调用
        })
            
            $('#Personal').find('.xinxi').removeClass("hover");
            $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
            $('#Personal').find('.btn-success').css({'display': 'none'});
            layer.close(index);

        }
    };
    //初始化宽度、高度
    $(".admin_modify_style").height($(window).height());
    $(".recording_style").width($(window).width() - 400);
    //当文档窗口发生改变时 触发  
    $(window).resize(function () {
        $(".admin_modify_style").height($(window).height());
        $(".recording_style").width($(window).width() - 400);
    });

    //修改密码
    function change_Password() {
        layer.open({
            type: 1,
            title: '修改密码',
            area: ['300px', '300px'],
            shadeClose: true,
            content: $('#change_Pass'),
            btn: ['确认修改'],
            yes: function (index, layero) {
                if ($("#password").val() == "") {
                    layer.alert('原密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                if ($("#Nes_pas").val() == "") {
                    layer.alert('新密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }

                if ($("#c_mew_pas").val() == "") {
                    layer.alert('确认新密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                if (!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val()) {
                    layer.alert('密码不一致!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                } else {
                	var id = <?php echo ($data["id"]); ?>;
                	//console.log($("#Nes_pas").val()+"==="+$("#password").val())
                	var pawData = {"id":id,"password":$("#Nes_pas").val(),"oldpassword":$("#password").val()};
                	console.log(pawData);
                	 $.ajax({
			            url: "<?php echo U('Admin/Index/exitUserPassword');?>",//请求地址
			            data: pawData,//发送的数据
			            type: 'POST',//请求的方式
			            success: function (argument) {
			            	console.log(argument);
			            	if(argument==100){
				            		layer.alert('原密码错误！', {
			                        title: '提示框',
			                        icon: 1,
		                    	});
			            	}else{
			            		layer.alert('修改成功！', {
			                        title: '提示框',
			                        icon: 1,
			                    });
			            	}
			                 
		                    layer.close(index);
			            },// 请求成功执行的方法
			            beforeSend: function (argument) {
			                //console.log(argument);
			            },// 在发送请求之前调用,可以做一些验证之类的处理
			            error: function (argument) {
			            },//请求失败调用
			        })
                   
                }
            }
        });
    }
</script>
<script>
    jQuery(function ($) {
        var oTable1 = $('#sample-table').dataTable({
            "aaSorting": [[1, "desc"]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable": false, "aTargets": [0, 2, 3, 4, 5, 6]}// 制定列不参与排序
            ]
        });


        $('table th input:checkbox').on('click', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });
    });</script>