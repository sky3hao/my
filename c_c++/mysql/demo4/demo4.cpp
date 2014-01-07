#include "demo4.h"
/**
 * ʹ��mysql C���ӿ�   �õ���mysql��c api    ��link�Ľ׶��õ���libmysqk.lib 
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
		//��ȡfield����
		while((field = mysql_fetch_field(result))){
			printf("%10s ", field->name);
		}
		cout<<endl;
		//��ȡfield���ڵ�ֵ
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
