## PHP一个导航站
- 自助增加链接
- 自助管理链接
- 自动统计来源，并根据来源多少排序（数据更新时间段自定义）
- 邮件订阅
- 多颜色模板
- 链接自定义颜色
- 广告控制
- 推荐链接自动排首位

## 部署
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
*/5 * * * * php /home/wwwroot/index.php Api autoSoturce  #每5分钟更新一次来源
0 0 * * * php /home/wwwroot/index.php Api autoUpateDaySource  #每天凌晨0点清空当天的来源
!wq #保存文件

/sbin/service crond reload  #重新加载定时任务
/sbin/service crond restart  #重启定时任务
```