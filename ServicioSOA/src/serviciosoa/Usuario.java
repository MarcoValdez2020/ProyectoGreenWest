/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serviciosoa;

/**
 *
 * @author Yobiz
 */
public class Usuario {

  private final int id_usuario, id_cuenta;
  private final String nombre, apellidoP, apellidoM;


  public Usuario(final int id_usuario, final String nombre, final String  apellidoP, final String  apellidoM, final int id_cuenta) {
      this.id_usuario = id_usuario;
      this.nombre = nombre;
      this.apellidoP = apellidoP;
      this.apellidoM = apellidoM;
      this.id_cuenta = id_cuenta;
  }
}