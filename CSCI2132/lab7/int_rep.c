`int_rep.c
char *binary_rep(short int x) {
  static char bits[20];
  char *bit = bits + 19;
  unsigned char i, j;
  for (i = 0; i < 4; ++i) {
    *(bit--) = ' ';
    for (j = 0; j < 4; ++j) {
      *(bit--) = '0' + (x & 1);
      x >>= 1; }
  }
  bits[19] = 0;
  return bits;
} 

int_rep.c
int main() {
  short int x;
  printf("Enter a number: ");
  scanf("%hd", &x);
  printf("The binary representation is %s\n", binary_rep(x));
  return 0;
}