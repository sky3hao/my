#include "demo4.h"
/**
 * 使用mysql C连接库   用到了mysql的c api    在link的阶段用到了libmysqk.lib 
 *
 */
using namespace std;

int main(int argc, char** argv) {
    //MYSQL *mysql=(MYSQL*)malloc(sizeof(MYSQL)*100);
	MYSQL *mysql=new MYSQL;
	MYSQL_RES *result;
	MYSQL_FIELD *field;
	MYSQL_ROW row;
	int num_fields;
	int i;

    mysql_init(mysql);
    if (!mysql_real_connect(mysql, "127.0.0.1", "root", "123", "test", 3306,
    NULL, 0)) {
        printf("Error:%s", mysql_error(mysql));
    } else {
		mysql_query(mysql, "SELECT * FROM tab1");
		result = mysql_store_result(mysql);
		num_fields = mysql_num_fields(result);
		//获取field名称
		while((field = mysql_fetch_field(result))){
			printf("%10s ", field->name);
		}
		cout<<endl;
		//获取field对于的值
		while ((row = mysql_fetch_row(result))){
			for(i = 0; i < num_fields; i++){
				printf("%10s ", row[i] ? row[i] : "NULL");
			}
				cout<<endl;
		}
        
    }

    mysql_close(mysql);
	//free(mysql)
	delete mysql;
	system("pause");
	
    return 0;
}
