## PHP一个导航站
- 自助增加链接
- 自助管理链接
- 自动统计来源，并根据来源多少排序（数据每小时更新）
- 邮件订阅

##部署
1、store目录需要0777权限

2、 如果是nginx环境，需要配置nginx.conf,在里面增加如下：
``` ssh
location / { 
   if (!-e $request_filename) {
   rewrite  ^(.*)$  /index.php?s=$1  last;
   break;
    }
```

3、设置定时任务,
``` ssh
crontab -e  #编辑定时任务
* */1 * * * php /home/wwwroot/index.php Api autoSoturce
```