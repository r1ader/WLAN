## iphone访问电脑文件


背景杂谈：个人因为在电脑中下载了大量漫画，又想在手机上看，无奈手机是iphone没有安卓那么自由的文件管理功能，于是就想到了把电脑配成一个服务器，用iphone通过局域网访问电脑上的图片。

P.S.刚开始一个文件夹里有太多图片，加载要好久，那时候不知道懒加载，想了好多的解决办法，都没成功，后来终于在百度过程中碰到了懒加载这个关键词，问题迎刃而解。

因为filetype函数的字符集支持原因，如果文件夹名中有不常用字符可能会报错造成不能访问。


### 2018/04/09 加入了对mp4，mkv格式视频的支持（部分mkv格式莫名无效orz）


## 以下是食用教程。

1.安装wamp，将index.php文件和js文件夹放在www目录下。

2.修改httpd.conf中的权限 , 然后还要关闭window防火墙！！！！！(这一点坑了我好久T T)

	httpd.conf文件路径为 C:\wamp\bin\apache\apache2.4.9\conf\httpd.conf
	
	(1) 在第240行左右的位置将
	
    > <Directory />  
        AllowOverride none  
        Require all denied  
    </Directory>  
	
	修改为：

    <Directory />  
        AllowOverride none  
        Require all granted  
    </Directory>  
	
	(2) 在第280行左右的位置在“Require local”后面加上一句：“Require all granted”
	
	

3.电脑与手机连接同一wifi

再用手机网页访问电脑的内网ip，即可访问储存在电脑上www目录中的图片。