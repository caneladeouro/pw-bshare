import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbCategoria1620423363511 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_categoria",
        columns: [
          {
            name: "cd_categoria",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "nm_categoria",
            type: "varchar",
            length: "45",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_categoria");
  }
}
