#laravel5 amazeui后台管理

---
使用步骤：
> 1 搭建homestead环境（参考laravel官网），安装好composer,bower
> 2 添加一个虚拟主机：serve laravel5-amazeui-admin.app ~/www/laravel5-amazeui-admin/public，添加域名到hosts文件
> 3 安装PHP依赖库：composer install
> 4 进入public/libs下，安装前端依赖库：bower install
> 5 修改.env数据库配置信息
> 6 执行： php artisan migrate
> 7 执行： php artisan db:seed

----

浏览器打开http://laravel5-amazeui-admin.app/进入登录界面：

用户角色：用户名/密码
管理员账号：roben/roben
测试账号1：test1/test1
测试账号2：test2/test2

----

github
laravel5    https://github.com/laravel/laravel
amazeui    https://github.com/allmobilize/amazeui

-----
相关资源
http://amazeui.org/
http://laravel.com/
http://www.golaravel.com/laravel/docs/5.0/