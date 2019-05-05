#include <stdio.h>
int main(){
  /*
  int x=8.92;
  printf("x is %d",x);
  
  float f=3.12, frac_part=0.0;
  printf("f is %f\nfrac_part is %f\n",f,frac_part);
  printf("\n frac_part = %f - %d\n",f,(int)f);
  frac_part = f - (int) f;
  printf("f is %f\nfrac_part is %f\n",f,frac_part);
  */
  float quotient1, quotient2, quotient3, quotient4;
  int dividend = 5;
  int divisor = 4;

  quotient1 = dividend / divisor;
  quotient2 = (float) dividend / divisor;
  quotient3 = (float) (dividend / divisor);
  quotient4 = 1.0f * dividend / divisor;
  printf("%f\n%f\n%f\n%f\n", quotient1, quotient2, quotient3, quotient4);

}
