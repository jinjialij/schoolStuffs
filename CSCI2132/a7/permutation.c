#include <stdio.h>

//outside loop
int permuOut(int input, int count, int arr[],int temp){
  if(count>=input){
    return 0;
  }
  else{
    temp=arr[count];
    arr[count]=0;
    //
    permuInside(input,arr);
    arr[count]=temp;
    count++;
    permuOut(input,count,arr,temp);    
  }

}



//print all elements in the array except elements equal to 0
int printArr(int arr[],int input,int i){
  int temp=arr[i];
  if(i==input){
    return 0;
  }
  else{
    if(arr[i]!=0)
      printf("%d",arr[i]);
    i++;
    printArr(arr,input,i);
  }
}


//inside loop
int permuInside(int arr[], int input,int inNum,int outNum){
  int temp=arr[inNum];
  if(outNum>=input || inNum>=input){
    return 0;
  }
  else if(arr[inNum]==0){
    inNum++;
    permuInside(arr,input,inNum,outNum);
  }
  else{
    printf("%d ",arr[inNum]);
    arr[inNum]=0;
    permuInside(arr,input,inNum,outNum);
    //printArr(arr,input,0);
    arr[inNum]=temp;
    inNum++;
    permuInside(arr,input,inNum,outNum);
  }
}

//outside loop
int permuTop(int input,int arr[],int inNum,int outNum){
  if(input-outNum==0){//exceed the size of array
    return 0;//end function
  }
  else{
    printf("%d \n",arr[outNum]);
    
    //for each element
    int temp=arr[outNum];
    arr[outNum]=0;//let arr[i]=0
    inNum=0;
    //call function
    puts("permutation of this element:");
    permuInside(arr,input,inNum,outNum);
    //permuTop(input,arr,count+1);
    arr[outNum]=temp;//restore arr[i]
    //
    outNum++;
    //inNum=0;
    puts("its elements: ");
    permuTop(input,arr,inNum,outNum);
  }
}

int main(int argc, char **argv) {
  //read input number through cmd line
  int num=0,input=0,initial=1,inNum=0,outNum=0;
  sscanf(argv[1],"%d",&input);
  printf("%d\n",input);
  
  //create an array contains 1 till n
  puts("Elements in the array are: ");
  int numbers[input-1];
  //int *p=numbers;
  for(num=0;num<input;num++){
    numbers[num]=initial++;
    printf("%d  ",numbers[num]);
  }
  puts(" ");
  puts("element: ");
  permuTop(input,numbers,inNum,outNum);
  puts(" ");
  
  return 0;
}
