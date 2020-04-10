# 安装及使用方法

## 安装

```
git clone https://github.com/cr4fun/php-markdown-blog
cd php-markdown-blog
comporser install
```

## 配置

conf.yaml

```
# 博客名称
site_name: MDblog
# 主题
theme: default
# markdown 风格
markdown: night
```

## 运行

```
cd public
php -S 0.0.0.0:3000
```

## 如何添加博客文章

markdown文档，放在posts文件夹里。

需要注意遵循格式：

 年-月-日-文件名称.md

文件名称不可以包括 - 可以使用下划线，不能有空格。markdown的第一行必须有大标题。

## 如何添加页面

markdown文档，放在pages文件夹里。

需要注意遵循格式：

 文件名称.md

文件名称不可以包括符号，不能有空格。markdown的第一行必须有大标题。

## 图片应该放在那里？

放在 public\assets 文件夹里。

```
![](/assets/logo.png)
```

![](/assets/logo.png)