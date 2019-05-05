#include <stdio.h>

int main() {
  int a,b,c;
  
  printf("Enter a telephone number [(xxx)xxx-xxxx]: ");
  scanf("(%d)%d-%d",&a,&b,&c);
    printf("The number is %.3d,%.3d,%.4d\n",a,b,c);
  return 0;
}
