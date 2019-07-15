### 개발 환경  
nginx/1.14.1  
PHP 7.0.33-5+ubuntu18.04.1+deb.sury.org+1 (cli)  
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper  
Laravel Framework 5.5.45  
  
### AWS  
.ssh/config  
Host myapp_deployer  
Hostname public DNS  
User deployer  
IdentityFile ~/.ssh/key.pem  
  
Host myapp_ubuntu  
Hostname public DNS  
User ubuntu  
IdentityFile ~/.ssh/key.pem  
  
### 커스터마이징 한 내용  
1.User profile edit,update  
2.User password edit,update  
3.Add phone_number,address to user model  
4.Add attachment delete button to article edit form  
5.Apply replies() softDeletes  
6.Shop categories  
7.Shop products CRUD  
8.Admin  
9.Shop Orders  
  
참조 : 라라벨로 배우는 실전 PHP 웹 프로그래밍 (김주원님 지음)  
많은 부분을 위의 책에서 참조 했고 제 스타일로 커스터마이징 했습니다.  