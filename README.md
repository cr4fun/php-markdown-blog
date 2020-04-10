# php-markdown-blog

## 介绍

静态博客有很多，我也不想重复造轮子。所以开发一个特别的。它基于PHP7.2，无需数据库，直接使用markdown。

它面向的是，不想把博客部署在github pages上的用户。它不需要生成静态页面。它成本低，python主机很贵，但PHP主机很便宜。

因此，这个系统只要上传到PHP版本为7.2及以上的PHP虚拟主机上，就可以使用了。

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

## todo

* 分页

* 其他


## 欢迎 issue

欢迎大家写主题，主题在public/themes文件夹中。可在 conf.yaml 中设置。