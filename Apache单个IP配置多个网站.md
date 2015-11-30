Apache单个IP配置多个网站
=====================
>术语[虚拟主机](http://httpd.apache.org/docs/2.4/vhosts/)：指的是在单一机器上运行多个网站 (例如 company1.example.com 和 company2.example.com) 。 虚拟主机可以“基于 IP”，即每个 IP 一个站点； 或者“基于名称”， 即每个 IP 多个站点。这些站点运行在同一物理服务器上的事实不会明显的透漏给最终用户。

引申:同上、单域名多网站也是可行的。

##前提
#####开启虚拟机
在apache配置文件http.conf中找到配置项
		
		# Virtual hosts                                                                                                         
    	#Include /Applications/XAMPP/etc/extra/httpd-vhosts.conf  
修改为

	    # Virtual hosts                                                                                                         
    	Include /Applications/XAMPP/etc/extra/httpd-vhosts.conf  
##具体操作步骤
1.打开apache配置文件，路径/opt/lamp/etc/http.conf。新增端口:
	
	#Listen 12.34.56.78:80
	Listen 80
	#新增端口
	Listen 9191
	Listen 9090
2.配置虚拟机文件,/opt/lampp/etc/extra/httpd-vhosts.conf。新增虚拟机配置:
	
	<VirtualHost *:80>
    ServerAdmin simmonsoft@web
    DocumentRoot "/opt/lampp/htdocs"
    ServerName web
    ErrorLog "logs/web-error_log"
    CustomLog "logs/web_log" common
	</VirtualHost>

	<VirtualHost *:9090>
    ServerAdmin simmonsoft@crm2
    DocumentRoot "/opt/lampp/htdocs/crm2/trunk/src/laravel/public"
    ServerName crm2
    ErrorLog "logs/crm2-error_log"
    CustomLog "logs/crm2_log" common
	</VirtualHost>
3.最后,执行 /opt/lampp/lampp  reloadapache。

**坑：配制虚拟机的时候，一直object not found。后来查找是路径后面出现了乱码～。**