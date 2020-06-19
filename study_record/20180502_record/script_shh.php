查看 ~目录下 .shh 文件夹下  id_rsa.pub  文件中的公钥
ssh root@123.56.134.85  ssh连接服务器
cd  ~bin 目录下 建立新的sh文件 如  push_cfda.sh  并添加代码

#!/bin/bash
#cd /home/work/release/e  本地仓库目录
cd /Users/zihao/release/cfda
dd=`date +%y%m%d%H%M%S`
mkdir $dd
cd $dd
echo -e "\033[44;37m `pwd` \033[0m"
git clone http://172.16.0.2/cfda/a.git .
#git checkout -b  develop origin/develop
echo -e "\033[32m start releasing to  123.56.134.85 ... \033[0m"
rm -rf config/config
rm -rf .git
rsync -avz ./* root@123.56.134.85:/var/www/html/
#if [ $2 = "demo" ]; then
#fi
echo "Done"


赋予可执行权限
执行这个脚本 可以将代码上传至服务器


/Users/zihao/bin

















###### push_fda.sh
#!/bin/bash
cd /Users/zihao/release/fda
dd=`date +%y%m%d%H%M%S`
mkdir $dd
cd $dd
echo -e "\033[44;37m `pwd` \033[0m"
git clone  http://172.16.0.2/cfda/e.git .
#git checkout -b  develop origin/develop
echo -e "\033[32m start releasing to  123.56.134.85 ... \033[0m"
rm -rf config/config
rm -rf .git
rsync -avz ./* root@123.56.134.85:/var/www/html/
#if [ $2 = "demo" ]; then
#fi
echo "Done"
