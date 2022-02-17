# Yii2 项目模板

在 Yii2 官方的高级项目模板上做了以下修改：

- 去掉了对 Vagrant 的支持
- 删除了示例代码
- 启用 URL 静态化
- 添加了 PHP CS Fixer 配置文件
- 连接 MySQL 时使用 utf8mb4 字符集编码
- 使用 Yarn 管理前端依赖
- 允许内网 IP 访问 Yii 的调试工具条
- 添加 yiisoft/yii2-shell 开发依赖
- 去掉了 init 脚本，使用 app.env 来切换场景

## 使用

1）初始化 Docker Compose 配置

    cp docker-compose.override.yml.dist docker-compose.override.yml

2）运行 PHP-FPM 容器，使用项目模板创建项目

    docker-compose run --rm fpm ash
    composer create-project modi/yii2-starter:dev-master

3）初始化项目配置

    cp app.env.dist app.env

4）创建 `common/config/params-local.php`

如：

    <?php

    return [
    ];

5）整体启动

    docker-compose up -d
