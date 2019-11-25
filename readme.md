# laravel_quick_admin

## 背景

起这个项目的初衷是，对于一个后台管理系统，登陆、注销、权限管理等都是些公用的模块，完全可以封装成一个基础项目，每次新的项目基于基础项目上开发即可，节约时间，提高开发效率。

## 功能模块

- 登陆
- 找回密码
- 修改密码
- 注销
- 管理员管理
- 权限管理
- 角色管理
- 支持多语言

## 代码模块

- route
- controller
- service
- model
- log
- request
- Repository  (关于这个仁者见仁智者见智吧,本项目弃用repository设计模式)

## 项目搭建

比较简单，主要以下几步

1. `composer install`
2. 修改`.env`文件相关配置
3. 执行`laravel_quick_admin/laravel_quick_admin.sql`文件中的sql语句
4. 登陆信息：账号：1234@qq.com  密码：1234

## 注意点
因为博主用的数据库是mariadb，创建时间和更新时间的默认值为current_timestamp(),如果你是mysql的话，应该修改为CURRENT_TIMESTAMP 

## 展望

后续会更新出一版 前后端分离的基础后台框架，敬请期待。

## 感谢

laravel -- 艺术家最爱的框架

H-ui -- 轻量级前端框架

# zhengshu
