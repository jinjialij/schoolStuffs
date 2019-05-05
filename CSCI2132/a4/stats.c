#include <stdio.h>
#include <math.h>

int main(){
  
  int n,i;
  double sum=0,a=0,sd=0,m,M,variance;

  scanf("%d",&n);
  double number[n];
  
  for(i=1;i<n+1;i++){
    if(i==n){
      scanf("%lf",&number[i-1]);
    }
    else{
	scanf("%lf\n",&number[i-1]);
    }
  
  }
  m=number[0];
  M=number[0];
  for(i=1;i-1<n;i++){
    sum=sum+number[i-1];

    if(m>number[i-1]){
      m=number[i];
    }
    if(M<number[i-1]){
      M=number[i-1];
    }

  }
  a=sum/n;

  for(i=1;i-1<n;i++){
    variance=variance+(number[i-1]-a)*(number[i-1]-a);
  }
  sd=sqrt(variance/n);

  printf("m = %.3f\nM = %.3f\na = %.3f\ns = %.3f\n", m,M,a,sd);

  return 0;



}
