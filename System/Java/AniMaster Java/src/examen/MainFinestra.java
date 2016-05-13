package examen;
import java.awt.*;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.*;

public class MainFinestra extends JFrame {
    private final JFrame frame; // Finestra
    private final JPanel panel;  // Panell Contenidor
    private final JTextArea textArea;
    
    public MainFinestra(){
        frame = new JFrame("Mostrar Llibres");
        panel = (JPanel)frame.getContentPane();
        textArea = new JTextArea(1,20);
        
    }
    public void programa() throws Exception{
        panel.add(textArea);
        textArea();
        carregarDades();
        frame.setSize(200,400);
        frame.setVisible(true);
    }
    public void textArea(){
        textArea.setBackground(new java.awt.Color(30, 30, 30));
        Font font = new Font("Verdana", Font.BOLD, 12);
        textArea.setFont(font);
        textArea.setForeground(Color.white);
        textArea.setEditable(false);
    }
    public void carregarDades() throws Exception{
        LlibreBD llibreBD = new LlibreBD();
        ArrayList returnLlibres = llibreBD.getLlibres();
        int max = returnLlibres.size();
        String res = "| ISBN  | AUTOR | TITOL | \n################\n";
        for (int i = 0; i < max; i++){
            res = res + returnLlibres.get(i).toString()+ "\n";
        }
        llibreBD.tancar();
        textArea.setText(res);
        
    }
    
    public static void main(String[] args) {
        try{
            MainFinestra e = new MainFinestra();
            e.programa(); 
        }catch(Exception e){
            System.out.println(e);
        }       
    }
}
