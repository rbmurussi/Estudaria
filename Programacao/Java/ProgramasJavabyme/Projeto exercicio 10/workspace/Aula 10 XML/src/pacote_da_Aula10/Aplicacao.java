package pacote_da_Aula10;

import java.io.OutputStream;

public class Aplicacao {

	public int teste;
	public String nome;
	public double salario;
	
	public Aplicacao(){
		
	}
	
	public Aplicacao(int teste,String nome,double salario){
		this.teste = teste;
		this.nome=nome;
		this.salario=salario;
	}
	public static void main(String[] args) throws Exception {
		Aplicacao a = new Aplicacao(5,"gilson",1.5);
		//XMLHandler.write(a);
		Aplicacao b = (Aplicacao) XMLHandler.read(Aplicacao.class);
		System.out.println(b.nome);

	}

}
