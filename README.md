### 项目介绍

teambition网盘是阿里旗下的一款目前不限制上传下载带宽的网盘，处于公测阶段，目前容量给了2T。

使用过程中，发现还没有文件共享功能（不知道是我没找到还是姿势不对还是怎么样，反正我没有哈哈哈哈），

于是就想利用teambition网盘做一个公开的文件共享的站点吧（没错，我没那么大的服务器磁盘和带宽，于是就借了teambition的）

功能类似于nginx的autoindex之类的目录列出，只不过这个目录并不是自己服务器上的，而是teambition的

可以设置仅共享某个指定文件夹下的内容


Demo站点：http://file.doubi.fun


### 使用

PHP环境请自行搭建，将项目文件放至网站根目录下

若需要二级目录部署，请自行修改相关代码

在resources下，将sample.config.php重命名成config.php，并配置好里面需要的参数



以下为各个参数的说明：



##### TEAMBITION_COOKIE：

用于调用teambition的api去获取目录、文件地址等用的。
获取方法，在浏览器中登陆teambition网盘，然后利用开发者工具网页调试，查看cookie，获取到TEAMBITION_SESSIONID和TEAMBITION_SESSIONID.sig两个cookie的值，拼接成`TEAMBITION_SESSIONID=xxxxxx; TEAMBITION_SESSIONID=yyyyyyyyyyy;`的字符串，为TEAMBITION_COOKIE的值



##### TEAMBITION_ORGID：

在浏览器登录teambition网盘后，找到URL中/org/后的内容，即为TEAMBITION_ORGID



##### TEAMBITION_DRIVEID：

在浏览器登录teambition网盘后，访问 https://pan.teambition.com/pan/api/orgs/TEAMBITION_ORGID （TEAMBITION_ORGID换成对应上面的内容），在返回结果中找到driveId的值即为TEAMBITION_DRIVEID



##### TEAMBITION_ROOT_NODEID：

想作为根目录共享的文件夹ID，在浏览器登录teambition网盘后，点开你想设置为根目录来共享的文件夹，在URL中找到/folder/后面的内容即为TEAMBITION_ROOT_NODEID



##### THEMEPATH：

主题目录，目前保持默认即可



##### REWRITE_MODE：

是否开启URL伪静态



#### 致谢

相关页面的样式元素等均拷贝自DirectoryLister项目

https://github.com/DirectoryLister/DirectoryLister

https://www.directorylister.com


