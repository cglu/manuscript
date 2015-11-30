Apache单个IP配置多个网站
=====================
>术语[虚拟主机](http://httpd.apache.org/docs/2.4/vhosts/)：指的是在单一机器上运行多个网站 (例如 company1.example.com 和 company2.example.com) 。 虚拟主机可以“基于 IP”，即每个 IP 一个站点； 或者“基于名称”， 即每个 IP 多个站点。这些站点运行在同一物理服务器上的事实不会明显的透漏给最终用户。

引申:同上、单域名多网站也是可行的。

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
