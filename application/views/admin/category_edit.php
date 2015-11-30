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
                <li class="am-active"><a href="#tab1">栏目信息</a></li>
            </ul>
            <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right  admin-form-text">父栏目</div>
                        <div class="am-u-sm-12 am-u-md-10">
                            <select data-am-selected="{btnSize: 'sm'}">
                                <option value="0">顶级栏目</option>
                                <?php foreach ($catlist as $row): ?>
                                    <option value="<?php echo $row['id']; ?>" <?php if($fid == $row['id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            栏目标题
                        </div>
                        <div class="am-u-sm-12 am-u-md-6">
                            <input type="text" class="am-input-sm" value="<?php echo $name; ?>">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            关键字
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm" value="<?php echo $keywords; ?>">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            描述
                        </div>
                        <div class="am-u-sm-12 am-u-md-6">
                            <textarea rows="3"><?php echo $description; ?></textarea>
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            栏目别名
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-end col-end">
                            <input type="text" class="am-input-sm" value="<?php echo $nickname; ?>">
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right  admin-form-text">首页模板</div>
                        <div class="am-u-sm-12 am-u-md-10">
                            <select data-am-selected="{btnSize: 'sm'}">
                                <option>模板1</option>
                                <option>模板2</option>
                                <option>模板3</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right  admin-form-text">列表模板</div>
                        <div class="am-u-sm-12 am-u-md-10">
                            <select data-am-selected="{btnSize: 'sm'}">
                                <option>模板1</option>
                                <option>模板2</option>
                                <option>模板3</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right  admin-form-text">内容模板</div>
                        <div class="am-u-sm-12 am-u-md-10">
                            <select data-am-selected="{btnSize: 'sm'}" style="overflow: visible !important;">
                                <option>模板1</option>
                                <option>模板2</option>
                                <option>模板3</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            说明
                        </div>
                        <div class="am-u-sm-12 am-u-md-6">
                            <textarea rows="3"><?php echo $intro; ?></textarea>
                        </div>
                        <div class="am-u-md-4"></div>
                    </div>
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
                            <input type="text" class="am-input-sm" value="<?php echo $orders; ?>">
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
