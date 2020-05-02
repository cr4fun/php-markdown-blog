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
site:
  # 博客名称
  name: cr4fun的博客
  # 博客logo
  logo: /assets/logo.png

# 主题
theme: light

# 作者
author: 
  name: cr4fun
  face: /assets/logo.png

# 友情连接
friendlinks:
  -item
    name: wireframe
    url: https://wireframe.cc
  -item
    name: figma
    url: https://www.figma.com
  -item
    name: invisionapp
    url: https://www.invisionapp.com/
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