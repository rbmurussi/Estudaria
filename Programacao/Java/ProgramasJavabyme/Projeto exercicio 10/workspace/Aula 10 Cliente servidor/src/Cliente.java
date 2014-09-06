import java.io.IOException;
import java.io.InputStream;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OutputStream;
import java.net.Socket;
import java.net.UnknownHostException;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.w3c.dom.Text;


public class Cliente {

	
	
	public static void main(String[] args) throws UnknownHostException, IOException, ParserConfigurationException, ClassNotFoundException {
		Double x = 2.5;
		Double y = 5.5;
		ObjectOutputStream oos = null;
		ObjectInputStream ois = null;
		Socket s = new Socket("localhost",6003);
		try{
		InputStream is = s.getInputStream();
		OutputStream os = s.getOutputStream();
		
		DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
		DocumentBuilder db = dbf.newDocumentBuilder();
				
		//Cria um novo documento XML
		Document doc = db.newDocument();
				
		//Cria a tag raiz 'usuarios'
		Element rootElem = doc.createElement("request");
		doc.appendChild(rootElem);
		
		Element op = doc.createElement("op");
		Text opt = doc.createTextNode("soma");//definir a opera��o aqui
		op.appendChild(opt);
		rootElem.appendChild(op);
		
		Element valor1 = doc.createElement("valor1");
		Text valor = doc.createTextNode(x.toString());//definir o valor 1 aqui
		valor1.appendChild(valor);
		rootElem.appendChild(valor1);
		
		Element valor2 = doc.createElement("valor2");
		Text valordois = doc.createTextNode(y.toString());//definir a opera��o aqui
		valor2.appendChild(valordois);
		rootElem.appendChild(valor2);
		
		oos = new ObjectOutputStream(os);
		oos.writeObject(doc);
		
		
		
		ois = new ObjectInputStream(is);
		Document doc2 = (Document)ois.readObject();
		
		
		Element rootElem2 = doc2.getDocumentElement();
		NodeList result = rootElem2.getElementsByTagName("result");//retorna uma lista com todos os filhos usuario da tag raiz

		Element resultElem = (Element) result.item(0);
		
		
		double resultDouble = Double.parseDouble(resultElem.getTextContent());
		
		System.out.println("O resultado �: " + resultDouble);
		}finally{oos.close();ois.close(); s.close();}

	}

}
