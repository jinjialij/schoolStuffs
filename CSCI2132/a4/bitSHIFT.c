#include <stdio.h>

int main(){
  int i=5;
  printf("i = %d\n",i);
  printf("i<<1 = %d\n",i<<1);
  printf("i<<2 = %d\n",i<<2);
  printf("i<<3 = %d\n",i<<3);
  printf("\n");

  printf("i<<1 =i*2^1=5*2^1=%d\n",i<<1);
  printf("i<<2 =i*2^2=5*2^2=%d\n",i<<2);
  printf("i<<3 =i*2^3=5*2^3=%d\n",i<<3);
  printf("\n");

  printf("i>>1 = %d\n",i>>1);
  printf("i>>2 = %d\n",i>>2);
  printf("i>>3 = %d\n",i>>3);

  printf("i>>1 =i/2^1=5/2=2 = %d\n",i>>1);
  printf("i>>2 =i/2^2=5/4=1 = %d\n",i>>2);
  printf("i>>3 =i/2^3=5/8=0 = %d\n",i>>3);
  printf("\n");

  int a=9;
  
  while(a>0){
    a=a>>1;
    printf("a >> 1 = %d\n",a);    
  }

  i=9;
  printf("i>>1 =i/2^1=9/2=2 = %d\n",i>>1);
  printf("i>>2 =i/2^2=9/4=2 = %d\n",i>>2);

  return 0; 



}
