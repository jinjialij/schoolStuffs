#include <stdio.h>

int main(){
  int l,m,n,i,j,row=0,col=0;
  scanf("%d%d%d",&l,&m,&n);
  float a[l][m],b[m][n],c[l][n];
  /*matrix A*/
  for(i=0;i<l;i++){
    for(j=0;j<m;j++){
      scanf("%f\n",&a[i][j]);
    }
  }
  
  /*matrix B*/
  for(i=0;i<m;i++){
    for(j=0;j<n;j++){
      if(i==m-1 && j==n-1)
	scanf("%f",&b[i][j]);
      else
	scanf("%f\n",&b[i][j]);
    }
  }
  printf("\n");
  printf("%d %d \n",l,n);

  /*Matrix C*/
  for(i=0;i<l;i++){
    for(j=0;j<n;j++){
      //for each col of c
      for(col=0;col<m;col++){
	c[i][j]+=a[i][col]*b[col][j];
      }
      printf("%.2f  ",c[i][j]);
    }
    printf("\n");
  }
  
}
