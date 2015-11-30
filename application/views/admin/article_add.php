<!-- content start -->
<div class="admin-content">

    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表单</strong> /
            <small>form</small>
        </div>
    </div>
    <form class="am-form">
        <div class="am-tabs am-margin" data-am-tabs>

            <ul class="am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="#tab1">文章信息</a></li>
                <li><a href="#tab2">其他选项</a></li>
            </ul>
            <div class="am-tabs-bd">

                <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right  admin-form-text">所属类别</div>
                        <div class="am-u-sm-12 am-u-md-10">
                            <select data-am-selected="{btnSize: 'sm'}">
                                <?php foreach ($catlist as $row): ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            文章标题
                        </div>
                        <div class="am-u-sm-12 am-u-md-6">
                            <input type="text" class="am-input-sm" value="">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            关键字
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm" value="">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            描述
                        </div>
                        <div class="am-u-sm-12 am-u-md-6">
                            <textarea rows="3"></textarea>
                        </div>
                        <div class="am-u-md-4">不填写则自动截取内容前255字符</div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            缩略图
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            内容
                        </div>
                        <div class="am-u-sm-12 am-u-md-8">
                            <script id="container" name="content" type="text/plain"></script>
                            <script type="text/javascript" src="/public/UEditor/ueditor.config.js"></script>
                            <script type="text/javascript" src="/public/UEditor/ueditor.all.js"></script>
                            <script type="text/javascript">
                                var editor = UE.getEditor('container');
                            </script>
                        </div>
                        <div class="am-u-md-2"></div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            标签
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm" value="">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>

                </div>

                <div class="am-tab-panel am-fade" id="tab2">
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3 am-u-md-2 am-text-right">显示状态</div>
                        <div class="am-u-sm-9 am-u-md-10">
                            <div class="am-btn-group" data-am-button>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option1"> 正常
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option2"> 待审核
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option3"> 不显示
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3 am-u-md-2 am-text-right">评论开关</div>
                        <div class="am-u-sm-9 am-u-md-10">
                            <div class="am-btn-group" data-am-button>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option1"> 开启
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option2"> 关闭
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3 am-u-md-2 am-text-right">推荐类型</div>
                        <div class="am-u-sm-9 am-u-md-10">
                            <div class="am-btn-group" data-am-button>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="checkbox"> 置顶
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="checkbox"> 推荐
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="checkbox"> 热门
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="checkbox"> 轮播图
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3 am-u-md-2 am-text-right">跳转状态</div>
                        <div class="am-u-sm-9 am-u-md-10">
                            <div class="am-btn-group" data-am-button>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option1"> 开启
                                </label>
                                <label class="am-btn am-btn-default am-btn-xs">
                                    <input type="radio" name="options" id="option2"> 关闭
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            跳转地址
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm" value="">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            排序
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm" value="">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3 am-u-md-2 am-text-right">
                            发布时间
                        </div>
                        <div class="am-u-sm-9 am-u-md-6">
                            <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
                                <input type="text" class="am-form-field am-input-sm" placeholder="日历组件" readonly>
                                <span class="am-input-group-btn am-datepicker-add-on">
                                    <button class="am-btn am-btn-default am-btn-sm" type="button">
                                        <span class="am-icon-calendar"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="am-margin">
            <input type="submit" value="提交保存" class="am-btn am-btn-primary am-btn-xs">
            <input type="reset" value="放弃保存" class="am-btn am-btn-danger am-btn-xs">
        </div>
    </form>
</div>
<!-- content end -->
