-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2013 年 05 月 05 日 23:07
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zkpc`
--

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_code_comment`
--

CREATE TABLE IF NOT EXISTS `zkpc_code_comment` (
  `ccid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` varchar(128) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `cfr_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ccid`),
  KEY `FK_comment_fragment` (`cfr_id`),
  KEY `FK_comment_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `zkpc_code_comment`
--

INSERT INTO `zkpc_code_comment` (`ccid`, `pid`, `path`, `content`, `created_at`, `updated_at`, `cfr_id`, `user_id`) VALUES
(1, 0, '1,', '很好，很实用', '2013-03-24 19:06:56', '2013-03-24 19:06:56', 7, 1),
(2, 0, '2,', '还可以，马马虎虎', '2013-03-24 19:07:48', '2013-03-24 19:07:48', 11, 1),
(3, 0, '3,', '还可以', '2013-03-24 19:07:57', '2013-03-24 19:07:57', 10, 1),
(4, 0, '4,', '呵呵', '2013-03-24 19:35:59', '2013-03-24 19:35:59', 10, 1),
(5, 1, '1,5,', '哈哈', '2013-03-24 19:36:32', '2013-03-24 19:36:32', 7, 1),
(8, 0, '8,', 'ffff', '2013-04-14 14:29:32', '2013-04-14 14:29:32', 7, 1),
(9, 5, '1,5,9,', '咯咯', '2013-04-14 15:20:11', '2013-04-14 15:20:11', 7, 1),
(10, 7, '6,10,', 'tt', '2013-04-14 15:22:22', '2013-04-14 15:22:22', 7, 1),
(11, 0, '11,', 'evvvvv', '2013-04-14 15:22:32', '2013-04-14 15:22:32', 7, 1),
(12, 3, '3,12,', 'qq', '2013-04-14 15:23:00', '2013-04-14 15:23:00', 10, 1),
(13, 0, '13,', '很好', '2013-04-14 17:17:06', '2013-04-14 17:17:06', 3, 1),
(14, 13, '13,14,', '还可以吧', '2013-04-14 17:17:28', '2013-04-14 17:17:28', 3, 1),
(15, 0, '15,', '还行', '2013-04-14 17:17:52', '2013-04-14 17:17:52', 3, 1),
(16, 0, '16,', 'so easy！！！', '2013-04-23 21:44:26', '2013-04-23 21:44:26', 13, 19),
(17, 0, '17,', 'of course！！！', '2013-04-23 21:45:17', '2013-04-23 21:45:17', 13, 1),
(18, 16, '16,18,', '嗯嗯，挺简单的', '2013-04-23 21:47:17', '2013-04-23 21:47:17', 13, 18);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_code_fragment`
--

CREATE TABLE IF NOT EXISTS `zkpc_code_fragment` (
  `cfid` int(11) NOT NULL AUTO_INCREMENT,
  `intro` text,
  `code` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `comments_count` int(11) DEFAULT '0',
  `love_count` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cfu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cfid`),
  KEY `FK_fragment_function` (`cfu_id`),
  KEY `FK_fragment_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `zkpc_code_fragment`
--

INSERT INTO `zkpc_code_fragment` (`cfid`, `intro`, `code`, `sort`, `comments_count`, `love_count`, `created_at`, `updated_at`, `user_id`, `cfu_id`) VALUES
(1, '<p>php把整数转化为二进制的简单方法<br /></p>', 'function int2b($int=0){\r\n	if($int>0){\r\n		return int2b(floor($int/2)).$int%2;\r\n	}\r\n}', 0, 0, 0, '2013-03-03 11:18:37', '2013-03-03 11:18:37', 1, 1),
(2, '<p><span style="color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;display:inline !important;float:none;">PHP转换字符串编码<span class="Apple-converted-space"> </span></span><br style="padding:0px;margin:0px;color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;" /><span style="color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;display:inline !important;float:none;">代码出处:<span class="Apple-converted-space"> </span></span><a href="http://www.befen.net/opensource/php-charset.html" target="_blank" rel="nofollow" style="padding:0px;margin:0px;color:#4466bb;outline:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;">http://www.befen.net/opensource/php-charset.html</a><br /></p>', '<?php\r\nfunction phpcharset($data, $to) {\r\n	if(is_array($data)) {\r\n		foreach($data as $key => $val) {\r\n			$data[$key] = phpcharset($val, $to);\r\n		}\r\n	} else {\r\n		$encode_array = array(''ASCII'', ''UTF-8'', ''GBK'', ''GB2312'', ''BIG5'');\r\n		$encoded = mb_detect_encoding($data, $encode_array);\r\n		$to = strtoupper($to);\r\n		if($encoded != $to) {\r\n			$data = mb_convert_encoding($data, $to, $encoded);\r\n		}\r\n	}\r\n	return $data;\r\n}\r\n?>', 0, 0, 0, '2013-03-03 11:20:15', '2013-03-03 11:20:15', 1, 2),
(3, '<p><span style="color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;display:inline !important;float:none;">1.随机位置随机长度的用指定字符替换原来字符串中的字符</span><br style="padding:0px;margin:0px;color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;" /><span style="color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;display:inline !important;float:none;">2.指定字符串指定长度末尾替换</span><br style="padding:0px;margin:0px;color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;" /><br style="padding:0px;margin:0px;color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;" /><span style="color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;display:inline !important;float:none;">eg: 1.encryptionStr(&quot;123456&quot;, 3, true, 2, &quot;*&quot;) &nbsp;--&gt;12345*6 or 1234**6 or 12345* </span><br style="padding:0px;margin:0px;color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;" /><span style="color:#000000;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:22px;orphans:2;text-align:left;text-indent:0px;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#f9f9f9;display:inline !important;float:none;"> &nbsp; &nbsp; 2.encryptionStr(&quot;123456&quot;, 3, false, 2, &quot;*&quot;) &nbsp;--&gt;12345**</span><br /></p>', '/**\r\n	 * @param str\r\n	 *            要处理的str\r\n	 * @param keepStart\r\n	 *            要保留的字符串\r\n	 * @param flag\r\n	 *            true-->随机位置随机替换 ,false-->尾部替换len个changeStr\r\n	 * @param num\r\n	 *            changeStr在str结果中的个数\r\n	 * @param changeStr\r\n	 *            替换使用changeStr,eg:"*"，"$","%" ....\r\n	 * @return\r\n	 */\r\n	public static String encryptionStr(String str, int keepStart, boolean flag,\r\n			int num, String changeStr) {\r\n		int lenAll = str.length();\r\n		int strLen = lenAll - keepStart;\r\n		if (keepStart > str.length()\r\n				|| str.length() - keepStart < changeStr.length())\r\n			return str;\r\n		String tempStr = str.substring(keepStart, str.length());\r\n		String pz = str.substring(0, keepStart);\r\n		String result = "";\r\n		Random r = new Random();\r\n		if (flag) {\r\n			num = r.nextInt(strLen - 1) + 1;\r\n			int tempLen = r.nextInt(strLen);\r\n			if (strLen - tempLen <= num) {\r\n				pz = str.substring(0, pz.length() + tempLen);\r\n				for (int i = 0; i < num && pz.length() < strLen + keepStart; i++) {\r\n					pz += changeStr;\r\n				}\r\n				return pz;\r\n			}\r\n			result = tempStr.substring(0, tempLen);\r\n			for (int i = 0; i < num && pz.length() < strLen + keepStart; i++) {\r\n				result += changeStr;\r\n			}\r\n\r\n			result += tempStr.substring(tempLen + num, strLen);\r\n			pz += result;\r\n		} else {\r\n			pz += str.substring(pz.length(), lenAll - num);\r\n			for (int i = 0; i < num; i++) {\r\n				pz += changeStr;\r\n			}\r\n		}\r\n		return pz;\r\n	}', 0, 3, 0, '2013-03-17 00:38:40', '2013-03-17 00:38:40', 1, 9),
(4, '<p><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#f9f9f9;">最近正在学C++和线性代数，于是便手痒写了一个关于行列式的类， 不过并不完善， 肯定有很多毛病，拿来分享下</span><br /></p>', '#ifndef DET_H\r\n#define DET_H\r\n\r\n#include <iostream>\r\n#include <vector>\r\nusing namespace std;\r\nclass Det\r\n{\r\n    public:\r\n        Det();\r\n        Det(int *,const size_t);\r\n        Det(int, int ,Det&);\r\n        virtual ~Det();\r\n\r\n        int size();\r\n        void add_end(int);\r\n        bool replace(int, int, int);\r\n        int get_element(int, int);\r\n        int get_rank();\r\n        int calculate();\r\n        int howtime();\r\n        void clear();\r\n\r\n        Det& operator<< (int);\r\n        int& operator[] (const size_t);\r\n    protected:\r\n    private:\r\n        vector<int> dat_lable;\r\n        int rank;\r\n\r\n        int convert_place(int, int);\r\n        void convert_coordinate(int, int&, int&);\r\n        int rank_two(int, int, int, int);\r\n        int sign(unsigned int);\r\n};\r\n\r\nostream& operator<< (ostream& output, Det& det);\r\nint operator+ (Det& det, int x);\r\nint operator- (Det& det, int x);\r\nint operator* (Det& det, int x);\r\nint operator/ (Det& det, int x);\r\nint operator% (Det& det, int x);\r\n#endif // DET_H\r\n', 0, 0, 0, '2013-03-17 21:39:38', '2013-03-17 21:39:38', 1, 10),
(5, '<pre class="brush:c#;toolbar:false;">public class Program\r\n   {\r\n       public static void DeepCopy(DirectoryInfo source, DirectoryInfo target, params string[] excludePatterns)\r\n       {\r\n           if (target.FullName.Contains(source.FullName))\r\n               return;\r\n       }\r\n    }</pre><p><br /></p>', 'using System;\r\nusing System.Collections.Generic;\r\nusing System.IO;\r\nusing System.Linq;\r\nusing System.Text;\r\nusing System.Text.RegularExpressions;\r\nusing System.Threading.Tasks;\r\n\r\nnamespace FileUtility\r\n{\r\n    public class Program\r\n    {\r\n        public static void DeepCopy(DirectoryInfo source, DirectoryInfo target, params string[] excludePatterns)\r\n        {\r\n            if (target.FullName.Contains(source.FullName))\r\n                return;\r\n\r\n            // Go through the Directories and recursively call the DeepCopy Method for each one\r\n            foreach (DirectoryInfo dir in source.GetDirectories())\r\n            {\r\n                var dirName = dir.Name;\r\n                var shouldExclude = excludePatterns.Aggregate(false, (current, pattern) => current || Regex.Match(dirName, pattern).Success);\r\n\r\n                if (!shouldExclude)\r\n                    DeepCopy(dir, target.CreateSubdirectory(dir.Name), excludePatterns);\r\n            }\r\n\r\n            // Go ahead and copy each file to the target directory\r\n            foreach (FileInfo file in source.GetFiles())\r\n            {\r\n                var fileName = file.Name;\r\n                var shouldExclude = excludePatterns.Aggregate(false,\r\n                                                              (current, pattern) =>\r\n                                                              current || Regex.Match(fileName, pattern).Success);\r\n\r\n                if (!shouldExclude)\r\n                    file.CopyTo(Path.Combine(target.FullName, fileName));\r\n            }\r\n        }\r\n\r\n        static void Main(string[] args)\r\n        {\r\n            DeepCopy(new DirectoryInfo(@"d:/test/b"), new DirectoryInfo(@"d:/test/a"));\r\n            DeepCopy(new DirectoryInfo(@"d:/test/c"), new DirectoryInfo(@"d:/test/c/c.1"));\r\n            DeepCopy(new DirectoryInfo(@"d:/test/1/"), new DirectoryInfo(@"d:/test/2/"), new string[] { ".*\\\\.txt" });\r\n\r\n            Console.WriteLine("复制成功...");\r\n            Console.ReadKey();\r\n        }\r\n    }\r\n}', 0, 0, 0, '2013-03-17 21:44:35', '2013-03-17 21:44:35', 1, 11),
(6, '', '数组倒置\r\n  class Program\r\n     {\r\n         static void Main(string[] args)\r\n         {\r\n             int[,] a = new int[,] { {1,3,5,7},{9,8,7,8},{5,89,56,8},{56,78,98,0}};\r\n             Console.WriteLine("数组倒置前的结果：");\r\n             for (int i = 0; i < 4; i++)\r\n             {\r\n                 for (int j = 0; j < 4; j++)\r\n                 {\r\n                     Console.Write(a[i,j].ToString());\r\n                     Console.Write("  ");\r\n                 }\r\n                 Console.WriteLine();\r\n             }\r\n             int m;\r\n             for (int x = 0; x < 4;x++ )\r\n             {\r\n                 for (int y = x + 1; y < 4; y++)\r\n                 {\r\n                     m = a[x, y];\r\n                     a[x, y]=a[y, x];\r\n                     a[y, x] = m;                    \r\n                 }\r\n             }\r\n             Console.WriteLine("数组倒置后的结果是：");\r\n             for (int i = 0; i < 4;i++ )\r\n             {\r\n                 for (int j = 0; j < 4; j++)\r\n                 {\r\n                     Console.Write(a[i,j].ToString());\r\n                     Console.Write("  ");\r\n                 }\r\n                 Console.WriteLine();\r\n             }\r\n         }\r\n     }\r\n\r\n阶乘\r\n\r\n\r\nstatic long jc(long num)\r\n         {\r\n             if (num > 0)\r\n             {\r\n                 return num *jc (num - 1);\r\n             }\r\n             else \r\n             {\r\n                 return 1;\r\n             }\r\n\r\n        }\r\n', 0, 0, 0, '2013-03-17 21:46:51', '2013-03-17 21:46:51', 1, 12),
(7, '<p><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:13px;line-height:19px;background-color:#f9f9f9;">将平常的输出语句简化</span><br /></p>', '​//: util/Print.java\r\n// Print methods that can be used without qualifiers,\r\n// using Java SE5 static imports:\r\npackage util;\r\nimport java.io.*;\r\n\r\n\r\npublic class Print {\r\n  // Print with a newline:\r\n  public static void println(Object obj) {\r\n    System.out.println(obj);\r\n  }\r\n  // Print a newline by itself:\r\n  public static void println() {\r\n    System.out.println();\r\n  }\r\n  // Print with no line break:\r\n  public static void print(Object obj) {\r\n    System.out.print(obj);\r\n  }\r\n  // The new Java SE5 printf() (from C):\r\n  public static PrintStream\r\n  printf(String format, Object... args) {\r\n    return System.out.printf(format, args);\r\n  }\r\n} ///:~​', 0, 6, 1, '2013-03-17 21:49:30', '2013-03-17 21:49:30', 1, 13),
(8, '', 'import java.util.ArrayList;\r\nimport java.util.BitSet;\r\nimport java.util.Iterator;\r\nimport java.util.LinkedHashSet;\r\nimport java.util.List;\r\nimport java.util.Set;\r\n\r\npublic class Prime {\r\n	public static void main(String[] args) {\r\n		for (int i = 10; i <= 35; i++) {\r\n			System.out.println(i + ": " + getPrimeFactors(i));\r\n		}\r\n	}\r\n	\r\n	public static List<Integer> getPrimeFactors(int x) {\r\n		List<Integer> primeFatorList = new ArrayList<Integer>();\r\n		Set<Integer> primeSet = getPrimeSet(x);\r\n		Iterator<Integer> primeIterator = primeSet.iterator();\r\n		int f = 2;\r\n		if (primeIterator.hasNext()) {\r\n			f = primeIterator.next();\r\n		}\r\n		\r\n		while (true) {\r\n			if (primeSet.contains(x)) {\r\n				primeFatorList.add(x);\r\n				break;\r\n			}\r\n			\r\n			while (x % f != 0) {\r\n				f = primeIterator.next();\r\n			}\r\n			\r\n			primeFatorList.add(f);\r\n			x /= f;\r\n		}\r\n		\r\n		return primeFatorList;\r\n	}\r\n	\r\n	public static Set<Integer> getPrimeSet(int n) {\r\n		BitSet primeBitSet = new BitSet(n);\r\n		for (int i = 1; i <= n; i++) {\r\n			primeBitSet.set(i);\r\n		}\r\n		\r\n		int s = (int)Math.sqrt(n);\r\n		for (int i = 2; i <= s; i++) {\r\n			if (primeBitSet.get(i)) {\r\n				for (int j = i * 2; j <= n; j += i) {\r\n					primeBitSet.set(j, false);\r\n				}\r\n			}\r\n		}\r\n		\r\n		Set<Integer> primeSet = new LinkedHashSet<Integer>();\r\n		for (int i = 2; i <= n; i++) {\r\n			if (primeBitSet.get(i)) {\r\n				primeSet.add(i);\r\n			}\r\n		}\r\n		\r\n		return primeSet;\r\n	}\r\n}', 0, 0, 1, '2013-03-17 21:51:58', '2013-03-17 21:51:58', 1, 14),
(9, '<p>我的功能比较好</p>', 'public function test() {\r\n\r\n    echo ''我的功能比较好'';\r\n}\r\n', 0, 0, 0, '2013-03-24 02:32:28', '2013-03-24 02:32:28', 18, 2),
(10, '<p>简单测试</p>', 'public static void main(String[] args) {\r\n\r\nSystem.out.println("hello world!");\r\n}', 0, 3, 0, '2013-03-24 15:37:10', '2013-03-24 15:37:10', 18, 13),
(11, '<p>测试二</p>', 'public static void main(String[] args) {\r\nSystem.out.println("hello world!");\r\n}                    ', 0, 1, 0, '2013-03-24 15:37:57', '2013-03-24 15:37:57', 18, 13),
(12, '<p>测试3</p>', 'package util;\r\nimport java.io.*;\r\n\r\n\r\npublic class Print {\r\n  // Print with a newline:\r\n  public static void println(Object obj) {\r\n    System.out.println(obj);\r\n  }\r\n  // Print a newline by itself:\r\n  public static void println() {\r\n    System.out.println();\r\n  }\r\n  // Print with no line break:\r\n  public static void print(Object obj) {\r\n    System.out.print(obj);\r\n  }\r\n  // The new Java SE5 printf() (from C):\r\n  public static PrintStream\r\n  printf(String format, Object... args) {\r\n    return System.out.printf(format, args);\r\n  }\r\n} ///:~​                  ', 0, 0, 0, '2013-03-24 15:38:26', '2013-03-24 15:38:26', 18, 13),
(13, '<p><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">一个java程序，可以输出九九乘法表 </span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">原文见这里： </span><a href="http://hua.219.me/posts/1359" rel="nofollow" style="padding:0px;margin:0px;color:#3e62a6;outline:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">http://hua.219.me/posts/1359</a><br /></p>', '/**\r\n * @(#)code3.java\r\n *\r\n *\r\n * @author \r\n * @version 1.00 2013/4/10\r\n */\r\n\r\npublic class code3 {\r\n\r\n    public code3() {\r\n    }\r\n	public static void main (String[] args) {\r\n		for(int i=1;i<10;i++){\r\n			for(int j=1;j<=i;j++){\r\n				System.out.print("\\t"+j+"x"+i+"="+j*i);\r\n			}\r\n			System.out.println ();\r\n		}\r\n	}    \r\n\r\n}\r\n\r\n\r\n//输出如下\r\n1x1=1\r\n1x2=2   2x2=4\r\n1x3=3   2x3=6   3x3=9\r\n1x4=4   2x4=8   3x4=12  4x4=16\r\n1x5=5   2x5=10  3x5=15  4x5=20  5x5=25\r\n1x6=6   2x6=12  3x6=18  4x6=24  5x6=30  6x6=36\r\n1x7=7   2x7=14  3x7=21  4x7=28  5x7=35  6x7=42  7x7=49\r\n1x8=8   2x8=16  3x8=24  4x8=32  5x8=40  6x8=48  7x8=56  8x8=64\r\n1x9=9   2x9=18  3x9=27  4x9=36  5x9=45  6x9=54  7x9=63  8x9=72  9x9=81', 0, 3, 1, '2013-04-10 18:36:47', '2013-04-10 18:36:47', 1, 16),
(14, '<p><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">JAVA 请递归高手写个程序（http://www.oschina.net/question/130274_109230）</span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">秋雨 发表于 2013-5-3 11:27</span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">请递归高手写个程序：</span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">传入一个字符串“Z|SY|K|DM” ,该字符串以“|”分隔，递归结果应该是：</span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">return : &quot;ZSKD,ZSKM,ZYKD,ZYKM&quot;;</span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">假如传入的字符串是：“Y|KG|S|D”,递归结果应该是：</span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">return : &quot;YKSD,YGSD&quot;; </span><br style="padding:0px;margin:0px;font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">可能作者本意并不是要递归实现，闲着无聊，只是按要求作答。</span><br /></p>', '//exp\r\npublic static void removeLetter(String[] strArray) {\r\n	boolean flag = true;\r\n	for (int i = 0; i < strArray.length; i++) {\r\n		String tmpStr = strArray[i];\r\n		if (tmpStr.length() > 1) {\r\n			for (int j = 0; j < tmpStr.length(); j++) {\r\n				strArray[i] = tmpStr.substring(0, j) + tmpStr.substring(j + 1, tmpStr.length());\r\n				removeLetter(strArray);\r\n				strArray[i] = tmpStr;\r\n			}\r\n			flag = false;\r\n		}\r\n	}\r\n	if (flag) {\r\n		for (String s : strArray)\r\n			System.out.print(s);\r\n		System.out.print(",");\r\n	}\r\n}\r\n\r\npublic static void main(String[] args) {\r\n	removeLetter("Z|SY|K|DM".split("[|]"));\r\n}', 0, 0, 0, '2013-05-03 19:15:58', '2013-05-03 19:15:58', 20, 17),
(15, '<p><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">PHP中文首字母转拼音</span><br /></p>', '\r\nfunction getfirstchar($s0) {\r\n	$fchar = ord(substr($s0, 0, 1));\r\n	if (($fchar >= ord("a") and $fchar <= ord("z"))or($fchar >= ord("A") and $fchar <= ord("Z"))) return strtoupper(chr($fchar));\r\n	$s = iconv("UTF-8", "gb2312", $s0);\r\n	$asc = ord($s{0}) * 256 + ord($s{1})-65536;\r\n	if ($asc >= -20319 and $asc <= -20284)return "A";\r\n	if ($asc >= -20283 and $asc <= -19776)return "B";\r\n	if ($asc >= -19775 and $asc <= -19219)return "C";\r\n	if ($asc >= -19218 and $asc <= -18711)return "D";\r\n	if ($asc >= -18710 and $asc <= -18527)return "E";\r\n	if ($asc >= -18526 and $asc <= -18240)return "F";\r\n	if ($asc >= -18239 and $asc <= -17923)return "G";\r\n	if ($asc >= -17922 and $asc <= -17418)return "I";\r\n	if ($asc >= -17417 and $asc <= -16475)return "J";\r\n	if ($asc >= -16474 and $asc <= -16213)return "K";\r\n	if ($asc >= -16212 and $asc <= -15641)return "L";\r\n	if ($asc >= -15640 and $asc <= -15166)return "M";\r\n	if ($asc >= -15165 and $asc <= -14923)return "N";\r\n	if ($asc >= -14922 and $asc <= -14915)return "O";\r\n	if ($asc >= -14914 and $asc <= -14631)return "P";\r\n	if ($asc >= -14630 and $asc <= -14150)return "Q";\r\n	if ($asc >= -14149 and $asc <= -14091)return "R";\r\n	if ($asc >= -14090 and $asc <= -13319)return "S";\r\n	if ($asc >= -13318 and $asc <= -12839)return "T";\r\n	if ($asc >= -12838 and $asc <= -12557)return "W";\r\n	if ($asc >= -12556 and $asc <= -11848)return "X";\r\n	if ($asc >= -11847 and $asc <= -11056)return "Y";\r\n	if ($asc >= -11055 and $asc <= -10247)return "Z";\r\n	return null;\r\n}', 0, 0, 0, '2013-05-03 19:18:05', '2013-05-03 19:18:05', 20, 18);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_code_function`
--

CREATE TABLE IF NOT EXISTS `zkpc_code_function` (
  `cfid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `read_count` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `pl_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cfid`),
  KEY `FK_function_type` (`ct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `zkpc_code_function`
--

INSERT INTO `zkpc_code_function` (`cfid`, `title`, `sort`, `read_count`, `created_at`, `updated_at`, `ct_id`, `pl_id`) VALUES
(1, '把整数转为二进制', 0, 1, '2013-03-03 11:18:36', '2013-03-03 11:18:36', 5, 2),
(2, 'PHP转换字符串编码', 0, 2, '2013-03-03 11:20:15', '2013-03-03 11:20:15', 5, 2),
(9, '简单加密字符串', 0, 1, '2013-03-17 00:38:40', '2013-03-17 00:38:40', 1, 1),
(10, '一个简陋的C++ 行列式运算类', 0, 2, '2013-03-17 21:39:37', '2013-03-17 21:39:37', 10, 3),
(11, '冒泡排序和快速排序', 0, 3, '2013-03-17 21:44:35', '2013-03-17 21:44:35', 10, 3),
(12, '数组倒置 阶乘', 0, 2, '2013-03-17 21:46:51', '2013-03-17 21:46:51', 12, 4),
(13, '输出简单话System.out.print', 0, 6, '2013-03-17 21:49:30', '2013-03-17 21:49:30', 1, 1),
(14, '分解质因数', 0, 3, '2013-03-17 21:51:58', '2013-03-17 21:51:58', 2, 1),
(16, '九九乘法表', 0, 3, '2013-04-10 18:36:46', '2013-04-10 18:36:46', 1, 1),
(17, ' 递归搞定《 JAVA 请递归高手写个程序》', 0, 3, '2013-05-03 19:15:57', '2013-05-03 19:15:57', 1, 1),
(18, ' PHP中文首字母转拼音', 0, 3, '2013-05-03 19:18:05', '2013-05-03 19:18:05', 5, 2);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_code_type`
--

CREATE TABLE IF NOT EXISTS `zkpc_code_type` (
  `ctid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `pl_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ctid`),
  KEY `FK_type_language` (`pl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `zkpc_code_type`
--

INSERT INTO `zkpc_code_type` (`ctid`, `name`, `state`, `sort`, `pl_id`) VALUES
(1, 'Java语言基础', 1, 0, 1),
(2, 'Java网络编程', 1, 0, 1),
(3, 'Android平台开发', 1, 0, 1),
(4, 'J2ME平台开发', 1, 0, 1),
(5, 'PHP语言基础', 1, 0, 2),
(6, 'PHP页面技巧', 1, 0, 2),
(7, 'PHP网络编程', 1, 0, 2),
(8, 'PHP数据库编程', 1, 0, 2),
(9, 'C/C++基础语法', 1, 0, 3),
(10, 'C/C++算法编程', 1, 0, 3),
(11, 'C/C++游戏开发', 1, 0, 3),
(12, 'C#基础语法', 1, 0, 4),
(13, 'C#网络编程', 1, 0, 4),
(14, 'C#图形和图像处理', 1, 0, 4);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_coolsite`
--

CREATE TABLE IF NOT EXISTS `zkpc_coolsite` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `favicon` varchar(64) DEFAULT NULL,
  `url` varchar(64) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `FK_upload_user` (`user_id`),
  KEY `FK_coolsite_type` (`ct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `zkpc_coolsite`
--

INSERT INTO `zkpc_coolsite` (`cid`, `name`, `favicon`, `url`, `state`, `sort`, `user_id`, `ct_id`) VALUES
(1, 'yiichina', 'http://www.yiichina.com/favicon.ico', 'http://www.yiichina.com', 1, 0, 1, 1),
(2, '开源中国', 'http://www.oschina.net/favicon.ico', 'http://www.oschina.net', 1, 0, 1, 2),
(3, 'java开源网', 'http://javakaiyuan.com/favicon.ico', 'http://javakaiyuan.com/', 1, 0, 1, 3),
(4, 'php100', 'http://www.php100.com/favicon.ico', 'http://www.php100.com/', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_coolsite_type`
--

CREATE TABLE IF NOT EXISTS `zkpc_coolsite_type` (
  `ctid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ctid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `zkpc_coolsite_type`
--

INSERT INTO `zkpc_coolsite_type` (`ctid`, `name`, `state`, `sort`) VALUES
(1, 'php网站', 1, 0),
(2, '其他', 1, 10),
(3, 'java网站', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_node`
--

CREATE TABLE IF NOT EXISTS `zkpc_node` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `topics_count` int(11) NOT NULL DEFAULT '0',
  `summary` varchar(128) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`nid`),
  KEY `FK_node_section` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `zkpc_node`
--

INSERT INTO `zkpc_node` (`nid`, `name`, `state`, `sort`, `topics_count`, `summary`, `section_id`) VALUES
(1, 'Java', 1, 0, 3, 'oop language', 1),
(2, 'PHP', 1, 0, 1, '脚本语言', 1),
(3, 'C/C++', 1, 0, 3, '基础语言', 1),
(4, 'C#', 1, 0, 0, '可视化编程', 1),
(5, '工具控', 1, 0, 1, '开发工具', 2),
(6, '瞎扯淡', 1, 0, 3, '闲聊', 2);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_options`
--

CREATE TABLE IF NOT EXISTS `zkpc_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) unsigned NOT NULL DEFAULT '0',
  `option_name` varchar(255) NOT NULL COMMENT '选项名称',
  `option_value` text NOT NULL COMMENT '值',
  PRIMARY KEY (`id`),
  KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='选项设置表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `zkpc_options`
--

INSERT INTO `zkpc_options` (`id`, `object_id`, `option_name`, `option_value`) VALUES
(1, 0, 'settings', '{"site_name":"windsdeng''s blog","site_closed":"no","close_information":"\\u7f51\\u7ad9\\u5728\\u7ef4\\u62a4\\u4e2d\\u3002<br \\/> \\u8bf7\\u7a0d\\u5019\\u8bbf\\u95ee\\u3002","site_url":"http:\\/\\/demo.dlf5.net\\/","keywords":"\\u9093\\u6797\\u950b\\u7684\\u535a\\u5ba2","description":"\\u9093\\u6797\\u950b\\u7684\\u535a\\u5ba2http:\\/\\/www.dlf5.com","copyright":"windsdeng''s blog","author":"winds","blogdescription":"\\u9093\\u6797\\u950b\\u7684\\u535a\\u5ba2","default_editor":"ueditor","theme":"classic","email":"winds@dlf5.com","rss_output_num":"10","rss_output_fulltext":"yes","post_num":"10","time_zone":"\\u4e0a\\u6d77","icp":"","footer_info":"","rewrite":"no","showScriptName":"false","urlSuffix":".html"}');

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_programming_language`
--

CREATE TABLE IF NOT EXISTS `zkpc_programming_language` (
  `plid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `highlighted` varchar(32) NOT NULL,
  PRIMARY KEY (`plid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `zkpc_programming_language`
--

INSERT INTO `zkpc_programming_language` (`plid`, `name`, `state`, `sort`, `highlighted`) VALUES
(1, 'Java', 1, 0, 'java.js'),
(2, 'PHP', 1, 0, 'php.js'),
(3, 'C/C++', 1, 0, 'c.js'),
(4, 'C#', 1, 0, 'c.js');

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_reply`
--

CREATE TABLE IF NOT EXISTS `zkpc_reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` varchar(128) DEFAULT NULL,
  `content` text NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `source` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `FK_reply_user` (`user_id`),
  KEY `FK_reply_topic` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `zkpc_reply`
--

INSERT INTO `zkpc_reply` (`rid`, `pid`, `path`, `content`, `state`, `source`, `created_at`, `updated_at`, `topic_id`, `user_id`) VALUES
(1, 0, '1,', '嗯嗯，确实是这样的', 1, NULL, '2013-04-14 16:48:24', '2013-04-14 16:48:24', 3, 1),
(5, 0, '5,', '测测2', 1, NULL, '2013-04-14 17:11:17', '2013-04-14 17:11:17', 3, 1),
(6, 0, '6,', '没用过，不知道', 1, NULL, '2013-04-14 17:49:59', '2013-04-14 17:49:59', 1, 1),
(7, 0, '7,', '没用过，不知道', 1, NULL, '2013-04-14 17:56:08', '2013-04-14 17:56:08', 1, 1),
(8, 0, '8,', '用过了，还可以', 1, NULL, '2013-04-14 17:59:37', '2013-04-14 17:59:37', 1, 1),
(9, 0, '9,', '没有听说过这个框架', 1, NULL, '2013-04-14 18:00:37', '2013-04-14 18:00:37', 1, 1),
(10, 6, '6,10,', '那就用用吧', 1, NULL, '2013-04-14 21:20:50', '2013-04-14 21:20:50', 1, 1),
(11, 8, '8,11,', '那就多用用吧', 1, NULL, '2013-04-14 21:24:54', '2013-04-14 21:24:54', 1, 1),
(12, 0, '12,', '一个神奇的框架', 1, NULL, '2013-04-14 21:25:34', '2013-04-14 21:25:34', 1, 1),
(13, 12, '12,13,', '吹吧你', 1, NULL, '2013-04-14 21:26:44', '2013-04-14 21:26:44', 1, 1),
(14, 0, '14,', '好东西，值得收藏', 1, NULL, '2013-04-23 21:41:34', '2013-04-23 21:41:34', 6, 19),
(15, 14, '14,15,', '的确不错', 1, NULL, '2013-04-23 21:42:31', '2013-04-23 21:42:31', 6, 1),
(16, 0, '16,', '很好', 1, NULL, '2013-05-03 22:33:41', '2013-05-03 22:33:41', 9, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_section`
--

CREATE TABLE IF NOT EXISTS `zkpc_section` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `zkpc_section`
--

INSERT INTO `zkpc_section` (`sid`, `name`, `state`, `sort`) VALUES
(1, 'Languages', 1, 0),
(2, '分享', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_topic`
--

CREATE TABLE IF NOT EXISTS `zkpc_topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` text,
  `state` int(1) NOT NULL DEFAULT '1',
  `replies_count` int(11) DEFAULT '0',
  `love_count` int(11) NOT NULL DEFAULT '0',
  `last_reply_user_id` int(11) DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `source` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `FK_topic_user` (`user_id`),
  KEY `Fk_topic_node` (`node_id`),
  KEY `FK_topic_last_reply_user` (`last_reply_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `zkpc_topic`
--

INSERT INTO `zkpc_topic` (`tid`, `title`, `content`, `state`, `replies_count`, `love_count`, `last_reply_user_id`, `replied_at`, `source`, `created_at`, `updated_at`, `node_id`, `user_id`) VALUES
(1, 'yii framework 很好用哟', 'php的一个开源框架可以开发各类大型WEB应用，并且高效率', 1, 8, 7, 1, '2013-04-14 21:26:44', '', '2012-12-19 23:05:58', '2012-12-19 23:09:29', 2, 1),
(2, 'php比java容易建网站', '用php开发小型的网站必用java快', 1, 0, 25, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(3, '从C到C++', '<div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">C++对C的“增强”,表现在六个方面：</div><div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">（1) 类型检查更为严格。</div><div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">（2) 增加了面向对象的<a target="_blank" href="http://baike.baidu.com/view/79349.htm" style="text-decoration:underline;color:#136ec2;">机制</a>。</div><div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">（3）增加了泛型编程的机制（template）</div><div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">（4）增加了异常处理</div><div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">（5）增加了运算符重载</div><div class="para" style="text-indent:30px;color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:start;text-transform:none;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;margin-bottom:14px;">（6）增加了标准模板库（STL）</div><p><br /></p>', 1, 0, 0, 0, NULL, NULL, '2013-03-16 16:08:39', '2013-03-16 16:08:39', 3, 1),
(4, 'Gitlab 5.1 发布，代码托管平台', '<div id="OSChina_News_39856" class="Body NewsContent TextContent"><p>Gitlab 5.1 发布了，该版本有诸多改进和性能上的提升，比较重要的4个改进是：</p><ol><li><p><span style="line-height:1.5;font-size:13px;">通知设置</span><span style="line-height:1.5;font-size:13px;">。你可以为每个项目分别设置通知级别（3个级别可选）。</span></p></li><li><p> 备份策略重构。现在会备份附件、向恢复的项目中写 hook 并在恢复的时候更新 ssh 权限。 </p></li><li><p> 网络图变得更酷了。包括垂直显示、commit信息等。 </p></li><li><p> 提升性能和减少内存占用，还有把应用服务器从 <a href="http://www.oschina.net/p/unicorn">Unicorn</a> 切换到 <a href="http://www.oschina.net/p/puma">Puma</a>。</p></li></ol><p><strong>Changes</strong><br /><br /> New Features:</p><ul><li><p><span style="line-height:1.5;font-size:13px;">Notification settings</span></p></li><li><p><span style="line-height:1.5;font-size:13px;">Login with username</span></p></li><li><p><span style="line-height:1.5;font-size:13px;">File history now tracks renames</span></p></li><li><p><span style="line-height:1.5;font-size:13px;">Show last commit on top of tree view</span></p></li></ul><p>Dependencies:</p><ul><li><p><span style="line-height:1.5;font-size:13px;">Unicorn replaced with Puma</span></p></li></ul><p>Security:</p><ul><li><p><span style="font-size:13px;line-height:1.5;">Admin has access to all projects now</span></p></li><li><p><span style="line-height:1.5;font-size:13px;">Several fixes to prevent XSS</span></p></li></ul><p><span style="font-size:13px;line-height:1.5;">Improved:</span></p><ul><li><p><span style="font-size:13px;line-height:1.5;">Dashboard performance</span></p></li><li><p><span style="font-size:13px;line-height:1.5;">Merge Request diff dump</span></p></li><li><p><span style="font-size:13px;line-height:1.5;">Backup tools</span></p></li><li><p><span style="font-size:13px;line-height:1.5;">Project transfer</span></p></li><li><p><span style="font-size:13px;line-height:1.5;">Miscellaneous Usability &amp; UI improvements and more.</span></p></li></ul><p><strong>Important upgrade note</strong><br /><br /><span style="font-size:13px;line-height:1.5;">We’ve fixed some bugs in the diff view for merge requests. Merge requests that were closed before the upgrade will display “Nothing to merge” after the upgrade. This can’t be prevented, please make sure you don’t need to revisit any closed merge requests before upgrading. Open merge requests are not affected, they will display the correct diff view.</span></p></div><p><br /></p>', 1, 0, 0, NULL, NULL, NULL, '2013-04-23 13:55:25', '2013-04-23 13:55:25', 6, 1),
(5, 'JavaScript 中的自动分号插入（ASI）', '<p> 原文：<a href="http://www.2ality.com/2011/05/semicolon-insertion.html" target="_blank" rel="nofollow">Automatic semicolon insertion in JavaScript</a></p><p> 译文：<a href="http://justjavac.com/javascript/2013/04/22/automatic-semicolon-insertion-in-javascript.html" target="_blank" rel="nofollow">JavaScript 中的自动分号插入（ASI）</a></p><p> 译者：<a href="http://weibo.com/thankwsx" target="_blank" rel="nofollow">jackyqi</a></p><p> 感谢 <a href="http://weibo.com/thankwsx" target="_blank" rel="nofollow">jackyqi</a> 帮我翻译这篇文章，如果对 javascript 比较感兴趣可以去微博关注他。 </p><p> 在 JavaScript 中，行尾的分号有一种自动插入机制，这样子，可以容忍某些朋友忽略了输入分号。 当然你最好养成输入分号的习惯，同时掌握 JavaScript 是如何处理忽略输入分号的情况的，因为这种知识有助于你理解没有分号的代码。 </p>', 1, 0, 0, NULL, NULL, NULL, '2013-04-23 15:39:29', '2013-04-23 15:39:29', 1, 2),
(6, 'VC++学习资料搜集整理（学VC++的朋友请进）', '<p> 分享教程《<span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">从C++起步到MFC实战VC++软件工程师高端培训》</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">1、http://kuai.xunlei.com/d/xmBrDwJtWgC.KUBRc58</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">2、http://kuai.xunlei.com/d/xmBrDwIiWwAMLEBR878</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">3、http://kuai.xunlei.com/d/xmBrDwKPXgC2N0BR013</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">4、http://kuai.xunlei.com/d/xmBrDwLQNgDQNCBRa56</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">5、http://kuai.xunlei.com/d/xmBrDwLYNgDlNCBR1c5</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">6、http://kuai.xunlei.com/d/xmBrDwIGNwDwNSBR18d</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">7、http://kuai.xunlei.com/d/xmBrDwIJNwD8NSBR5f4</span></p><p><span style="color:#333333;font-family:verdana, arial, helvetica, sans-serif;font-size:14px;line-height:18px;background-color:#ffffff;">8、http://kuai.xunlei.com/d/xmBrDwILNwAGNiBR16b</span></p>', 1, 2, 0, NULL, '2013-04-23 21:42:31', NULL, '2013-04-23 15:48:45', '2013-04-23 15:48:45', 3, 1),
(7, 'C语言中没有“类”概念吗？', '<p><span style="font-family:微软雅黑, verdana, sans-serif, 宋体;font-size:14px;line-height:22px;background-color:#ffffff;">我有c和c++的书籍，我是小白，我发现一个现象，在C语言的书中并没有讲“类“这个内容，难道类是c++才有的吗？？</span><br /></p>', 1, 0, 0, NULL, NULL, NULL, '2013-04-23 21:39:04', '2013-04-23 21:39:04', 3, 19),
(8, 'Web 服务器是多用户好,还是单用户好?', '<h4 style="margin:20px 0px 8px;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;color:#222222;text-rendering:optimizelegibility;line-height:15px;font-size:15px;border-left-width:15px;border-left-style:solid;border-left-color:#eeeeee;background-color:#ffffff;padding-left:5px;">我们的情况</h4><blockquote style="padding:0px 0px 0px 15px;margin:0px 0px 18px;border-left-width:5px;border-left-style:solid;border-left-color:#eeeeee;color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;"><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">我们正在部署Web服务器</p><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">操作系统是 ubuntu</p><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">部署工具是 capistrano</p><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">我们有三个服务器管理员</p><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">这三个人都可以登录服务器进行操作</p><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">他们的权限都是一样的，都可以使用sudo</p></blockquote><h4 style="margin:20px 0px 8px;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;color:#222222;text-rendering:optimizelegibility;line-height:15px;font-size:15px;border-left-width:15px;border-left-style:solid;border-left-color:#eeeeee;background-color:#ffffff;padding-left:5px;">我们有两个用户管理方案</h4><h4 style="margin:20px 0px 8px;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;color:#222222;text-rendering:optimizelegibility;line-height:15px;font-size:15px;border-left-width:15px;border-left-style:solid;border-left-color:#eeeeee;background-color:#ffffff;padding-left:5px;">第一 多个用户</h4><ul style="padding:5px 14px;margin:0px;list-style-position:inside;list-style-image:initial;color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;"><li style="line-height:20px;font-size:13px;"><p>创建一个 公共用户</p></li><li style="line-height:20px;font-size:13px;"><p>公共用户 不能登录</p></li><li style="line-height:20px;font-size:13px;"><p>公共用户 用于管理部署的公共文件，比如代码</p></li><li style="line-height:20px;font-size:13px;"><p>再为每个管理员，创建一个独立的用户</p></li><li style="line-height:20px;font-size:13px;"><p>每个管理员使用 自己的用户 登录</p></li><li style="line-height:20px;font-size:13px;"><p>用cap部署的时候 使用管理员自己的用户登录</p></li></ul><h4 style="margin:20px 0px 8px;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;color:#222222;text-rendering:optimizelegibility;line-height:15px;font-size:15px;border-left-width:15px;border-left-style:solid;border-left-color:#eeeeee;background-color:#ffffff;padding-left:5px;">第二 一个用户</h4><ul style="padding:5px 14px;margin:0px;list-style-position:inside;list-style-image:initial;color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;"><li style="line-height:20px;font-size:13px;"><p>创建一个 公共用户</p></li><li style="line-height:20px;font-size:13px;"><p>公共用户 可以登录</p></li><li style="line-height:20px;font-size:13px;"><p>每管理员使用 公共用户 登录</p></li><li style="line-height:20px;font-size:13px;"><p>用cap部署的时候 使用公共用户登录</p></li></ul><h4 style="margin:20px 0px 8px;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;color:#222222;text-rendering:optimizelegibility;line-height:15px;font-size:15px;border-left-width:15px;border-left-style:solid;border-left-color:#eeeeee;background-color:#ffffff;padding-left:5px;">我们的问题</h4><blockquote style="padding:0px 0px 0px 15px;margin:0px 0px 18px;border-left-width:5px;border-left-style:solid;border-left-color:#eeeeee;color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;"><p style="font-size:13px;line-height:19px;color:#666666;margin-top:0px;margin-bottom:10px;">这两个方案 那个比较好？</p></blockquote><h4 style="margin:20px 0px 8px;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;color:#222222;text-rendering:optimizelegibility;line-height:15px;font-size:15px;border-left-width:15px;border-left-style:solid;border-left-color:#eeeeee;background-color:#ffffff;padding-left:5px;">希望有服务器管理和维护经验的朋友，帮忙解答，谢谢！</h4>', 1, 0, 0, NULL, NULL, NULL, '2013-05-03 19:10:29', '2013-05-03 19:10:29', 6, 20),
(9, 'jQuery 直接添加 html 文本这种做法怎么样？', '<p><span style="color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;">$(&quot;div&quot;).html(&quot;Hello Again&quot;);</span><br style="color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;">我感觉不是很合适，那样式怎么办？</span><br style="color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;" /><span style="color:#333333;font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;background-color:#ffffff;">元素可以随便添加的，是不是会有问题？</span><br /></p>', 1, 1, 0, NULL, '2013-05-03 22:33:41', NULL, '2013-05-03 19:11:57', '2013-05-03 19:11:57', 1, 20),
(10, '发现还是IT人安全啊', '<p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">最近看微博，满目都是“朱令案”“黄洋案”。开始觉得学医、学生物、学化学的人都好危险。</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">他们作案条件太便利了。</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">也许很多人都有过一念之差，但我们学计算机的人，如果生气，顶多就是生个闷气，过了就过了。</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">不像医学、化学学生，手边就有各种无色无味置人于死地杀人于无形的化学物品。一时极端就真的下手了。</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">而且学化学的，除了人为投毒，还有很多其它意外啊！</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">“六十年代清华曾有过一次铊中毒事故。当时有个学生在打扫一个闲置很久的通风柜烟道时吸入了少量铊的氧化物，当晚就死亡了。”</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">觉得学计算机的人都好单纯。尤其有一次，看到一个四十多岁的老程序员，说起他的程序，那眼里的光，像是十岁小男孩说起自己的飞机模型。那时真觉得，玩计算机的人大概是这天底下最单纯的人了吧？<br />哦，也许幼儿园老师也挺单纯的。</p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">恩恩，看了一下午朱令案有感。</p>', 1, 0, 0, NULL, NULL, NULL, '2013-05-03 19:12:34', '2013-05-03 19:12:34', 6, 20),
(11, 'NB 的 Vim 插件 vim-dispatch', '<p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;"><a href="http://vimeo.com/63116209" rel="nofollow" target="_blank" style="color:#00438a;outline:0px;font-size:13px;">http://vimeo.com/63116209</a></p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;"><a href="https://github.com/tpope/vim-dispatch" rel="nofollow" target="_blank" style="color:#0069d6;text-decoration:initial;font-size:13px;">https://github.com/tpope/vim-dispatch</a></p><p style="font-family:&#39;helvetica neue&#39;, helvetica, arial, sans-serif;font-size:14px;line-height:22px;color:#333333;background-color:#ffffff;margin-top:0px;margin-bottom:10px;">不多说，必须装</p>', 1, 0, 0, NULL, NULL, NULL, '2013-05-03 19:13:31', '2013-05-03 19:13:31', 5, 20);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_user`
--

CREATE TABLE IF NOT EXISTS `zkpc_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(64) NOT NULL,
  `avatar_file_name` varchar(128) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `state` int(1) NOT NULL DEFAULT '1',
  `website` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pwd` varchar(128) NOT NULL,
  `pwd_salt` varchar(128) NOT NULL,
  `signature` varchar(128) DEFAULT NULL,
  `p_Intro` text,
  `persistence_token` varchar(128) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL,
  `failed_login_count` int(11) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `current_login_ip` varchar(64) DEFAULT NULL,
  `last_login_ip` varchar(64) DEFAULT NULL,
  `notes_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `zkpc_user`
--

INSERT INTO `zkpc_user` (`uid`, `username`, `email`, `name`, `avatar_file_name`, `verified`, `state`, `website`, `created_at`, `updated_at`, `pwd`, `pwd_salt`, `signature`, `p_Intro`, `persistence_token`, `login_count`, `failed_login_count`, `last_login_at`, `current_login_ip`, `last_login_ip`, `notes_count`) VALUES
(1, 'hanmis', 'mishubu1314@126.com', 'ban明quet', '', 0, 1, 'http://www.weibo.com/u/1986652804', '2012-12-08 17:37:30', '2013-05-03 18:44:30', 'eeced72140d53489d93ae409f1a45d71', 'zkpc518280d3d9e96', 'hello world', 'zker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'hanmis2', 'mishubu1314@1139.com', 'hello', NULL, 0, 1, NULL, '2012-12-08 18:01:24', '2012-12-08 18:01:24', '716d869bcbd2ddc1bbe07a4a31f84179', 'zkpc50c30ff400868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'hello', 'hello@126.com', 'hello', NULL, 0, 1, NULL, '2012-12-09 22:17:29', '2012-12-09 22:17:29', '136a7514c6e4dd86d24611fd21886e8c', 'zkpc50c49d79ad7dd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'world', 'world@qq.com', 'world', NULL, 0, 1, NULL, '2012-12-09 22:19:25', '2012-12-09 22:19:25', '52ecedb45866b76d50e14180bba06f75', 'zkpc50c49ded0375b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'test', 'test@qq.com', 'test', NULL, 0, 1, NULL, '2012-12-09 22:23:40', '2012-12-09 22:23:40', '18304bad4de6317e090a2f230982d0b7', 'zkpc50c49eec36bd7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'qqq', 'qqq@qq.com', 'qqq', NULL, 0, 1, NULL, '2012-12-09 22:24:44', '2012-12-09 22:24:44', '65a7ee8ccaf7959d0f7c3c6f0772b517', 'zkpc50c49f2c409eb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'admin', 'admin@qq.com', 'admin', NULL, 0, 1, NULL, '2012-12-19 22:53:25', '2012-12-19 22:53:25', 'eeced72140d53489d93ae409f1a45d71', 'zkpc518280d3d9e96', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'yetong', '212102331755@qq.com', 'yetong', NULL, 0, 1, NULL, '2013-03-12 21:55:59', '2013-03-12 21:55:59', '41246147dee639f0167a57ff5bede024', 'zkpc513f33ef7c3d1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'xuanxing', 'xuanxing@qq.com', 'xuanxing', NULL, 0, 1, NULL, '2013-03-12 21:58:23', '2013-03-12 21:58:23', 'c047a941ac532dedcbdb36df989550ae', 'zkpc513f347f23dc7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'ww', 'ww@qq.com', 'ww', NULL, 0, 1, NULL, '2013-03-12 22:23:25', '2013-03-12 22:23:25', '5bf4b0fc5b26f700ef4c7620e8a640cf', 'zkpc513f3a5d3fc7c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'tt', 'tt@qq.com', 'tt', NULL, 0, 1, NULL, '2013-03-12 22:52:45', '2013-03-12 22:52:45', '55ab3bda3f544f7e56c7f83d1fdf9b9f', 'zkpc513f413dcacfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'jj', 'jj@jk.com', 'jj', NULL, 0, 1, NULL, '2013-03-12 22:53:50', '2013-03-12 22:53:50', '60495d785c24971a8fdb4d8ec1c833c3', 'zkpc513f417eac7c8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'gg', 'gg@qq.com', 'gg', NULL, 0, 1, NULL, '2013-03-12 23:04:08', '2013-03-12 23:04:08', 'fef2f2ec96fe3ccb23048d3b3bc44ad1', 'zkpc513f43e8c7f7a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'll', 'll@ll.com', 'll', NULL, 0, 1, NULL, '2013-03-12 23:05:25', '2013-03-12 23:05:25', '1cf4537b994ce688eac7654f65826c31', 'zkpc513f4435a9dcd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'vv', 'vv@vv.com', 'vv', NULL, 0, 1, NULL, '2013-03-12 23:06:43', '2013-03-12 23:06:43', '92784cf0cecc90038cb5386cfa21afeb', 'zkpc513f4483d28f8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'rr', 'rr@rr.com', 'rr', NULL, 0, 1, NULL, '2013-03-12 23:07:38', '2013-03-12 23:07:38', '401e92830b65fdbf4561c12426d7b143', 'zkpc513f44bad3755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'username', 'name@qq.com', 'name', NULL, 0, 1, NULL, '2013-03-24 01:01:17', '2013-03-24 01:01:17', 'b58912d75a21a3ed2bb521a223dd2eb7', 'zkpc514ddfdd3d2be', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '用户名', 'mm@qq.com', '名字', NULL, 0, 1, NULL, '2013-04-23 21:29:15', '2013-04-23 21:29:15', '3638e0187323ea8021244e33b2a818b7', 'zkpc51768cab6d755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'liuhanming', '376841127@qq.com', '明', NULL, 0, 1, '', '2013-05-03 19:02:07', '2013-05-03 20:36:20', '509d03360969947a79414353da12fd1c', 'zkpc5183992f44f00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- 限制导出的表
--

--
-- 限制表 `zkpc_code_comment`
--
ALTER TABLE `zkpc_code_comment`
  ADD CONSTRAINT `FK_comment_fragment` FOREIGN KEY (`cfr_id`) REFERENCES `zkpc_code_fragment` (`cfid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_code_fragment`
--
ALTER TABLE `zkpc_code_fragment`
  ADD CONSTRAINT `FK_fragment_function` FOREIGN KEY (`cfu_id`) REFERENCES `zkpc_code_function` (`cfid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_fragment_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_code_function`
--
ALTER TABLE `zkpc_code_function`
  ADD CONSTRAINT `FK_function_type` FOREIGN KEY (`ct_id`) REFERENCES `zkpc_code_type` (`ctid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_code_type`
--
ALTER TABLE `zkpc_code_type`
  ADD CONSTRAINT `FK_type_language` FOREIGN KEY (`pl_id`) REFERENCES `zkpc_programming_language` (`plid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_coolsite`
--
ALTER TABLE `zkpc_coolsite`
  ADD CONSTRAINT `FK_coolsite_type` FOREIGN KEY (`ct_id`) REFERENCES `zkpc_coolsite_type` (`ctid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_upload_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_node`
--
ALTER TABLE `zkpc_node`
  ADD CONSTRAINT `FK_node_section` FOREIGN KEY (`section_id`) REFERENCES `zkpc_section` (`sid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_reply`
--
ALTER TABLE `zkpc_reply`
  ADD CONSTRAINT `FK_reply_topic` FOREIGN KEY (`topic_id`) REFERENCES `zkpc_topic` (`tid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_reply_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_topic`
--
ALTER TABLE `zkpc_topic`
  ADD CONSTRAINT `Fk_topic_node` FOREIGN KEY (`node_id`) REFERENCES `zkpc_node` (`nid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;
