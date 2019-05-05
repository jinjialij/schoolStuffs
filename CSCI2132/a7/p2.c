#include <stdio.h>

int permuInside(int arr[], int input,int i){
  int temp=arr[i],num;
  if(i==input){
    return 0;
  }
  else{
    printf("%d ",arr[i]);
    arr[i]=0;
    permuInside(arr,input,i+1);
    arr[i]=temp;
  }
}

int permuTop(int input,int arr[],int count){
  if(input-count==0){//exceed the size of array
    return 0;//end function
  }
  else{
    printf("%d \n",arr[count]);
    
    //for each element
    int temp=arr[i],num;
    arr[i]=0;//let arr[i]=0
    puts("now arr is: ");
    for(num=0;num<input;num++){
      printf("%d  ",arr[num]);
    }
    puts(" ");
    //call function
    permuInside(arr,input,(i+1));
    puts("after cal permuInside, arr is ");
    for(num=0;num<input;num++){
      printf("%d  ",arr[num]);
    }
    puts(" ");
    arr[i]=temp;//restore arr[i]
    puts("after arrr[i]=temp: ");
    for(num=0;num<input;num++){
      printf("%d  ",arr[num]);
    }

    //
    i++;
    puts("c ");
    permuTop(input,arr,i);
  }
}

int main(int argc, char **argv) {
  //read input number through cmd line
  int num=0,input=0,initial=1;;
  sscanf(argv[1],"%d",&input);
  printf("%d\n",input);
  
  //create an array contains 1 till n
  puts("Elements in the array are: ");
  int numbers[input-1];
  for(num=0;num<input;num++){
    numbers[num]=initial++;
    printf("%d  ",numbers[num]);
  }
  puts(" ");
  puts("element: ");
  permuTop(input,numbers,0);
  puts(" ");
  
  return 0;
}
