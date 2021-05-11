import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbDenuncia1620423116427 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_denuncia",
        columns: [
          {
            name: "cd_denuncia",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "ds_denuncia",
            type: "varchar",
            length: "45",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_denuncia");
  }
}
