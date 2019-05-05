#include <stdio.h>

int main(int argc, char **argv) {

  printf("Number of arguments = %d\n", argc);
  int i=0;
    for (i = 0; i < argc; ++i) {
    printf("Argument %d: %s\n", i, argv[i]);
  }
  return 0;
}
