import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbVideo1620430062007 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_video",
        columns: [
          {
            name: "cd_video",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "im_video",
            type: "varchar",
            length: "60",
          },
          {
            name: "cd_projeto",
            type: "char",
            length: "36",
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_usuario_tb_video",
            columnNames: ["cd_projeto"],
            referencedTableName: "tb_projeto",
            referencedColumnNames: ["cd_projeto"],
            onUpdate: "CASCADE",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_video");
  }
}
