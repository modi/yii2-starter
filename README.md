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
