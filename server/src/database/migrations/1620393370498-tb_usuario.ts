import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbUsuario1620393370498 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_usuario",
        columns: [
          {
            name: "cd_usuario",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "im_capa",
            type: "varchar",
            length: "60",
            isNullable: true,
          },
          {
            name: "nm_usuario",
            type: "varchar",
            length: "60",
          },
          {
            name: "cd_senha",
            type: "char",
            length: "64",
          },
          {
            name: "nm_email",
            type: "varchar",
            length: "60",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_usuario");
  }
}
