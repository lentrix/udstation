import java.util.Scanner;

public class GuessingGame {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        int a = (int) (Math.random() * 9 + 1);
        int b = 0;
        System.out.println("I hava a secret number.");
        System.out.println("It is between 1 to 10");
        System.out.println("Guess what number it is.");
        System.out.println("Enter your guess number");
        int c = input.nextInt();

        while (c != a) {
            if (c > 10 || c < c) {
                c = input.nextInt();
            } else if (a > c) {
                System.out.println("Sorry it is " + c + " Try again");
                System.out.println("Enter your guess number. ");
                c = input.nextInt();
                b++;
            } else if (a < c) {
                System.out.println("Sorry it is " + c + " Try again");
                Syetem.out.println("Enter your guess number. ");
                c =input.nextInt(); 
                b++;
            }
        }
        System.out.println("congratz! you got it after " + b + " tries!");
        input.close();
    }
    
}
